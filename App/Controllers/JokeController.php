<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Session;
use Framework\Validation;

class JokeController
{
    protected $db;

    /**
     * JokeController constructor/instantiator
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     *  Show the jokes page to the visitor
     *
     *  The controller requests the Joke page to be rendered,
     *  with lists of jokes shown.
     *
     * @return void
     */
    public function index(){
        $currentUser = Session::get('user');
        $current_user_id = $currentUser['id'];

        $JokeQuery = 'SELECT jokes.title AS jokes_title, categories.title AS categories_title,
       users.nickname as users_nickname, jokes.id AS jokes_id, users.id AS user_id
        FROM jokes
        LEFT JOIN categories ON jokes.category_id = categories.id
        LEFT JOIN users ON jokes.user_id = users.id
        ORDER BY RAND()';

        $jokes = $this->db->query($JokeQuery);

        loadView('jokes/jokes', [
            'jokes' => $jokes,
            'current_user_id' => $current_user_id
        ]);
    }

    /**
     * Show the content of the joke to the user.
     *
     * @param array $params
     * @return void
     */
    public function show(array $params){
        $JokeQuery = 'SELECT jokes.title AS jokes_title, jokes.content as jokes_content, 
        categories.title AS categories_title, users.given_name as user_fname, users.family_name as user_lname
        FROM jokes
        LEFT JOIN categories ON jokes.category_id = categories.id
        LEFT JOIN users ON jokes.user_id = users.id
        WHERE jokes.id = :id';

        $id = $params['id'] ?? '';

        $joke = $this->db->query($JokeQuery, ['id' => $id])->fetch();

        loadView('jokes/content', [
            'joke' => $joke
        ]);
    }

    /**
     * Search through the jokes from the input of the user. Searches through the content and not the title.
     *
     * @return void
     */
    public function search(){
        $searchTerm = $_GET['keywords'] ?? '';

        $SearchQuery = 'SELECT jokes.title AS jokes_title, categories.title AS categories_title,
        users.nickname as users_nickname, jokes.id AS jokes_id
        FROM jokes
        LEFT JOIN categories ON jokes.category_id = categories.id
        LEFT JOIN users ON jokes.user_id = users.id WHERE LOWER(jokes.content) LIKE LOWER(:search)';

        $searchParam = ['search' => '%' . $searchTerm . '%'];

        $result = $this->db->query($SearchQuery, $searchParam);

        loadView('jokes/result', [
            'jokes' => $result
        ]);
    }

    public function add_joke(){
        $categories = $this->db->
            query('SELECT DISTINCT id, title FROM categories ORDER BY title')->fetchAll();

        loadView('jokes/add', [
            'categories' => $categories
        ]);
    }

    public function store_joke()
    {
        $currentUser = Session::get('user');
        $user_id = $currentUser['id'];

        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;
        $category_id = $_POST['category'] ?? null;

        $errors = [];

        if (!Validation::string($title, 2, 50)) {
            $errors['given_name'] = 'Title must be between 2 and 50 characters';
        }

        if (!Validation::string($content, 5)) {
            $errors['family_name'] = 'Content must be at least 5 characters';
        }

        if (!Validation::string($category_id, 1)){
            $errors['category_id'] = 'Please choose a category';
        }

        if (!empty($errors)) {
            $categories = $this->db->query('SELECT DISTINCT id, title FROM categories ORDER BY title')->fetchAll();

            loadView('jokes/add', [
                'errors' => $errors,
                'categories' => $categories,
                'old_input' => [
                    'title' => $title,
                    'content' => $content,
                    'category_id' => $category_id
                ]
            ]);
            exit;
        }

        // Create joke details
        $params = [
            'title' => $title,
            'content' => $content,
            'category_id' => $category_id,
            'user_id' => $user_id
        ];

        $this->db->query('INSERT INTO jokes (title, content, category_id, user_id) VALUES (:title, :content, :category_id, :user_id)', $params);

        redirect('jokes/jokes');
    }

    public function user_jokes(){
        $currentUser = Session::get('user');
        $user_id = $currentUser['id'];

        $JokesQuery = "SELECT jokes.id AS jokes_id, jokes.title AS jokes_title, jokes.content as jokes_content,
            categories.title AS categories_title, users.given_name as user_fname, users.family_name as user_lname,
            users.nickname AS users_nickname
            FROM jokes
            LEFT JOIN categories ON jokes.category_id = categories.id
            LEFT JOIN users ON jokes.user_id = users.id
            WHERE user_id = :user_id";

//        $JokesQuery = "SELECT id AS jokes_id, title AS jokes_title, content as jokes_content FROM jokes WHERE user_id = :user_id";1

        $result = $this->db->query($JokesQuery, ['user_id' => $user_id])->fetchAll();

        loadView('jokes/mine', [
            'jokes' => $result
        ]);
    }

}