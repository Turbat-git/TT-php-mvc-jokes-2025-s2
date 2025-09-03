<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        Authorise.php
 * Location:
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace Framework\middleware;

use Framework\Session;

class Authorise
{
    /**
     * Handle the user's request
     *
     * @param  string  $role
     * @return bool | null
     */
    public function handle($role): bool|null
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
            return redirect('/');
        }

        if ($role === 'auth' && !$this->isAuthenticated()) {
            return redirect('/auth/login');
        }
        return false;
    }


    /**
     * Check if user is authenticated
     *
     * @return bool | null
     */
    public function isAuthenticated(): bool|null
    {
        return Session::has('user');
    }

    /**
     * Check if user has been active in the last 15 minutes
     *
     * Rehman, J. U. (2023, April 20). How To Automatically Logout Inactive
     * User in PHP | All PHP Tricks. All PHP Tricks - Web Development Tutorials and Demos.
     * https://www.allphptricks.com/how-to-automatically-logout-inactive-user-in-php/
     *
     * @return void
     */
    public static function isActive(): void
    {
        // TODO: Set the inactivity time of 15 minutes
        $inactivity_time = 60 * 60;

        $lastTimestamp = Session::get('last_timestamp', false);

        if ($lastTimestamp && (time() - $lastTimestamp > $inactivity_time)) {
            Session::clearAll();
            header("Location: /");
            exit();
        } else {
            session_regenerate_id(true);
            Session::set('last_timestamp', time());
        }

    }

}