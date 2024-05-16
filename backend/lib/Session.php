<?php
/**
 *Session Class
 **/
class Session
{
    public static function init()
    {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkAdminSession()
    {
        self::init();
        if (self::get("adminLogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
        else{
            return true;
        }
    }

    public static function checkUserSession()
    {
        self::init();
        if (self::get("userLogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
        else{
            return true;
        }
    }

    public static function checkUserLogin()
    {
        self::init();
        if (self::get("userLogin") == true) {
            header("Location:dashboard.php");
        }
        else{
            return false;
        }
    }

    public static function checkAdminLogin()
    {
        self::init();
        if (self::get("adminLogin") == true) {
            header("Location:dashboard.php");
        }
        else{
            return false;
        }
    }
    
    public static function destroy()
    {   
        self::init();
        session_unset();
        session_destroy();
        header("Location:login.php");
    }
}
