<?php
/**
 *  A ONE LINE ABOUT THIS FILE
 *
 * MULTI-LINE DESCRIPTION (OPTIONAL)
 * To tell the reader what this does in detail
 *
 * Project:         TT-php-mvc-jokes-2025-s2
 * Filename:        StaticPageController.php
 *Author:           Turbat Turkhuu <https://github.com/Turbat-012>
 *Date created:     2025-09-24
 *Version:          0.0
 */

namespace App\Controllers;

use App\Models\User;
use Framework\Database;

class StaticPageController
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

    public function about()
    {
        // Load the about view (passing any data if needed)
        loadView('static/about', [
            'developer' => 'Turbat Turkhuu',
            'appOverview' => 'This application is a simple jokes platform built using PHP MVC.',
            'technologies' => [
                'PHP 8.3.16',
                'MySQL/Mariadb',
                'Tailwind CSS'
            ]
        ]);
    }


}