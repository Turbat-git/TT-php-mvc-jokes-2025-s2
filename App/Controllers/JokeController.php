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
        $JokeQuery = 'SELECT jokes.title AS jokes_title, categories.title AS categories_title,
       users.nickname as users_nickname, jokes.id AS jokes_id
        FROM jokes
        LEFT JOIN categories ON jokes.category_id = categories.id
        LEFT JOIN users ON jokes.user_id = users.id
        ORDER BY RAND()';

        $jokes = $this->db->query($JokeQuery);

        loadView('jokes/jokes', [
            'jokes' => $jokes
        ]);
    }


    public function show(array $params){
        $JokeQuery = 'SELECT jokes.title AS jokes_title, jokes.content as jokes_content, 
        categories.title AS categories_title, users.given_name as user_fname, users.family_name as user_lname 
        FROM jokes
        LEFT JOIN categories ON jokes.category_id = categories.id
        LEFT JOIN users ON jokes.user_id = users.id
        WHERE jokes.id = :id';

        $id = $params['id'] ?? '';

        $joke = $this->db->query($JokeQuery, ['id' => $id])->fetch();

//        var_dump($joke);
//        exit;

        loadView('jokes/content', [
            'joke' => $joke
        ]);



    }

}