<?php

namespace App;

class AuthController
{
    /**
     * Zeige Login-Seite
     */
    static function login()
    {
        if (Auth::check()) {
            // user logout
            AuthController::logout();
            return false;
        }
        include dirname(__FILE__) . '/restaurant/pages/login.php';
        return true;
    }
    /**
     * Validiere Auth-Daten
     */
    static function authenticate()
    {
        $user = $_POST['name'];
        $pw = $_POST['password'];
        $db = new DatabaseController();
        $auth = $db->compare_user_credentials($user, $pw);
        if ($auth == false) {
            // falsche daten
            $_SESSION['login'] = false;
            // zurück zu login mit fehlermeldung
            header('Location: ' . config('server.protocol') . $_SERVER['HTTP_HOST'] . config('server.base_url') . '/login');
        } else {
            // login erfolgreich
            Auth::set($auth);
            // flash benachrichtigung
            flash("<i class='fas fa-check'></i> " . translate('login.success'), 'success');
            // weiter zur startseite
            header('Location: ' . config('server.protocol') . $_SERVER['HTTP_HOST'] . config('server.base_url'));
        }
    }
    /**
     * user-logout
     */
    static function logout()
    {
        Auth::clear();
        // weiterleiten zu loginseite
        header('Location: ' . config('server.protocol') . $_SERVER['HTTP_HOST'] . config('server.base_url') . '/login');
    }
}