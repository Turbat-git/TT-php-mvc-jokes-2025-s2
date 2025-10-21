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
     * @param array $params
     * @return void
     */
    public function search(array $params){
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

    public function add(array $params){
        $AddQuery = 'INSERT INTO jokes jokes_title, jokes_content, category_id, user_id 
                     VALUES(:jokes_title, :jokes_content, :category_id, :user_id)';

        $result = $db->query($AddQuery, params[])
    }

}