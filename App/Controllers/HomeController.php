<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        HomeController.php
 * Location:
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace App\Controllers;


use Framework\Authorisation;
use Framework\Database;
use Framework\middleware\Authorise;
use Framework\Session;

/**
 * HomeController Class
 *
 * Provides "static" pages to the end user.
 *
 * Includes:
 * - Home page
 * - Dashboard
 */
class HomeController
{
    protected $db;

    /**
     * HomeController constructor/instantiator
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);

    }

    /*
     * Show the home page to the visitor
     *
     * The controller requests the Home page to be rendered,
     * with a single random category shown and returns a random joke if the button on the homepage is pressed.
     *
     *
     * @return void
     */
    public function index()
    {
        $simpleRandomSixQuery = 'SELECT * FROM categories ORDER BY RAND() LIMIT 0,1';
        $categoryJokeCountQuery = 'SELECT COUNT(*) as total FROM jokes WHERE category_id = :category_id';

        $categories = $this->db->query($simpleRandomSixQuery)
            ->fetchAll();

        $categoryId = $categories[0]->id;
        $categoryJokeCount = $this->db->query($categoryJokeCountQuery,['category_id'=>$categoryId])->fetch();

        if (!empty($_GET['random'])) {
            $simpleRandomJokeQuery = 'SELECT * FROM jokes ORDER BY RAND() LIMIT 0,1';
            $joke = $this->db->query($simpleRandomJokeQuery)->fetch();


            loadView('home', [
                'category' => $categories[0],
                'jokeCount' => $categoryJokeCount->total,
                'joke' => $joke
            ]);
        } else{
            loadView('home', [
                'category' => $categories[0],
                'jokeCount' => $categoryJokeCount->total,
            ]);
        }
    }

    /*
     * Show the dashboard
     *
     * Dashboard statistics shown include:
     *  - number of categories
     *  - number of users
     *  - number of jokes
     *
     * TODO: Ensure that the correct counts are shown when dashboard is rendered
     *
     * @return void
     */
    public function dashboard()
    {

        if (  Session::get('user') ) {
            Authorise::isActive();
        }


        $lastSixQuery = 'SELECT * FROM categories ORDER BY created_at DESC LIMIT 0,2';
        $simpleRandomSixQuery = 'SELECT * FROM categories ORDER BY RAND() LIMIT 0,5';

        $categories= $this->db->query($simpleRandomSixQuery)
            ->fetchAll();

        $categoryCount = $this->db->query('SELECT count(id) as total FROM categories ')
            ->fetch();

        $userCount = $this->db->query('SELECT count(id) as total FROM users')
            ->fetch();


        loadView('dashboard', [
            'categories' => $categories,
            'categoryCount' => $categoryCount,
            'userCount' => $userCount,
        ]);
    }



    /*
     * Show the test static page
     *
     * @return void
     */
    public function test()
    {
        loadView('static/test', []);
    }


}