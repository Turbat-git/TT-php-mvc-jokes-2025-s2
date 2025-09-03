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


use Framework\Database;

class HomeController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /*
     * Show the home page
     *
     * @return void
     */
    public function index()
    {
        $simpleRandomSixQuery = 'SELECT * FROM categories ORDER BY RAND() LIMIT 0,1';

        $categories = $this->db->query($simpleRandomSixQuery)
            ->fetchAll();


        loadView('home', [
            'category' => $categories[0]
        ]);
    }

    /*
     * Show the authenticated user dashboard
     *
     * @return void
     */
    public function dashboard()
    {
        $lastSixQuery = 'SELECT * FROM categories ORDER BY created_at DESC LIMIT 0,6';
        $simpleRandomSixQuery = 'SELECT * FROM categories ORDER BY RAND() LIMIT 0,6';

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