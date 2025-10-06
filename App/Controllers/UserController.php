<?php
/**
 * User Controller
 *
 * Provides the Register, Login and Logout capabilities
 * of the application
 *
 * Filename:        UserController.php
 * Location:        App/Controllers
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace App\Controllers;

use Exception;
use Framework\Database;
use Framework\Session;
use Framework\Validation;

class UserController
{

    /* Properties */

    /**
     * @var Database
     */
    protected $db;

    /**
     * UserController Constructor
     *
     * Instantiate the database connection for use in this class
     * storing the connection in the protected <code>$db</code>
     * property.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show the login page
     *
     * @return void
     */
    public function login()
    {
        loadView('users/login');
    }

    /**
     * Show the login page
     *
     * @return void
     */
    public function profile()
    {
        loadView('users/profile');
    }

    /**
     * Show the register page
     *
     * @return void
     */
    public function register()
    {
        $states = $this->db->query('SELECT DISTINCT state_id, state_code, state_name FROM cities ORDER BY state_name')->fetchAll();
        $cities = $this->db->query('SELECT name, id, state_id, state_code, state_name FROM cities ORDER BY name')->fetchAll();

        loadView('users/register',  [
            'cities' => $cities,
            'states' => $states
        ]);
    }

    /**
     * Update the user's data
     *
     * @return void
     */
    public function updateProfile($key, $value)
    {
        $currentUser = Session::get('user');
        $id = $currentUser['id'];

        $given_name = $_POST['given_name'] ?? null;
        $family_name = $_POST['family_name'] ?? null;
        $nickname = $_POST['nickname'] ?? $given_name;
        $email = $_POST['email'] ?? null;
        $city = $_POST['city'] ?? null;
        $state = $_POST['state'] ?? null;

        $errors = [];

        if(!Validation::email($email)) {
            $errors['email'] = 'Invalid email';
        }

        if(!Validation::string($given_name,2, 50)) {
            $errors['given_name'] = 'Invalid given name';
        }

        if(!Validation::string($family_name,2, 50)) {
            $errors['family_name'] = 'Invalid family name';
        }



    }

    /**
     * Store user in database
     *
     * @return void
     */
    public function store_register()
    {
        $given_name = $_POST['given_name'] ?? null;
        $family_name = $_POST['family_name'] ?? null;
        $nickname = $_POST['nickname'] ?: $given_name;
        $email = $_POST['email'] ?? null;
        $city = $_POST['city'] ?? null;
        $state = $_POST['state'] ?? null;
        $password = $_POST['password'] ?? null;
        $passwordConfirmation = $_POST['password_confirmation'] ?? null;

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($given_name, 2, 50)) {
            $errors['given_name'] = 'Given name must be between 2 and 50 characters';
        }

        if (!Validation::string($family_name, 2, 50)) {
            $errors['family_name'] = 'Family name must be between 2 and 50 characters';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        if (!Validation::match($password, $passwordConfirmation)) {
            $errors['password_confirmation'] = 'Passwords do not match';
        }

        if (!empty($errors)) {

            $states = $this->db->query('SELECT DISTINCT state_id, state_code, state_name FROM cities ORDER BY state_name')->fetchAll();
            $cities = $this->db->query('SELECT name, id, state_id, state_code, state_name FROM cities ORDER BY name')->fetchAll();

            loadView('users/register', [
                'errors' => $errors,
                'user' => [
                    'given_name' => $given_name,
                    'family_name' => $family_name,
                    'nickname' => $nickname,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ],
                'cities' => $cities,
                'states' => $states
            ]);
            exit;
        }

        // Check if email exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if ($user) {
            $errors['email'] = 'That email already exists';
            loadView('users/create', [
                'errors' => $errors
            ]);
            exit;
        }

        // Create user account
        $params = [
            'given_name' => $given_name,
            'family_name' => $family_name,
            'nickname' => $nickname,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->query('INSERT INTO users (given_name, family_name, nickname, email,  password, city, state) VALUES (:given_name, :family_name, :nickname, :email, :password, :city, :state)', $params);

        // Get new user ID
        $userId = $this->db->conn->lastInsertId();

        // Set user session
        Session::set('user', [
            'id' => $userId,
            'given_name' => $given_name,
            'family_name' => $family_name,
            'nickname' => $nickname,
            'email' => $email,
            'city' => $city,
            'state' => $state
        ]);

        redirect('/');
    }

    public function profile_viewer()
    {
        $currentUser = Session::get('user');
        $id = $currentUser['id'];

        $params=[
          'id'=>$id
        ];

        $profile = $this->db->query('SELECT * FROM users WHERE id = :id', $params)->fetch();

        loadView('profile.view', ['profile' => $profile]);
    }

    /**
     * Logout a user and kill session
     *
     * @return void
     */
    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/auth/login?');
    }

    /**
     * Authenticate a user with email and password
     *
     * @return void
     */
    public function authenticate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        // Check for errors
        if (!empty($errors)) {
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Check for email
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if (!$user) {
            $errors['email'] = 'Incorrect credentials';
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Check if password is correct
        if (!password_verify($password, $user->password)) {
            $errors['email'] = 'Incorrect credentials';
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Set user session
        Session::set('user', [
            'id' => $user->id,
            'given_name' => $user->given_name,
            'family_name' => $user->family_name,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'city' => $user->city,
            'state' => $user->state,
            'last_timestamp' => time(),
        ]);

        redirect('/');
    }

}
