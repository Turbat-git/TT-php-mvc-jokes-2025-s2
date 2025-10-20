<?php

namespace App\Controllers;

use Framework\Database;

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
        $JokeQuery = 'SELECT jokes.title AS jokes_title, categories.title AS categories_title, users.nickname as users_nickname
        FROM jokes
        LEFT JOIN categories ON jokes.category_id = categories.id
        LEFT JOIN users ON jokes.user_id = users.id';

        $jokes = $this->db->query($JokeQuery);

        loadView('jokes/jokes', [
            'jokes' => $jokes
        ]);
    }

}