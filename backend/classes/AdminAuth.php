<?php 
$filepath = realpath(dirname(__FILE__));
include($filepath.'/../lib/Session.php');
Session::checkAdminLogin();
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

class AdminAuth
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
        if (empty($adminUser) || empty($adminPass)) {
            $loginmsg = "Username or Password must not be empty!";
            return $loginmsg;
        } else {
            $adminPass = md5($adminPass);
            $query = "SELECT * FROM admin_user WHERE (email = '$adminUser' OR username = '$adminUser') AND password = '$adminPass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("adminLogin", true);
                Session::set("adminId", $value['id']);
                Session::set("adminUsername", $value['username']);
                Session::set("adminName", $value['name']);
                Session::set("adminEmail", $value['email']);
                Session::set("adminLastLogin", $value['last_logged_in']);
                // header("Location:dashboard.php");
                return "success";
            } else {
                $loginmsg = "Invalid Credentials!";
                return $loginmsg;
            }
        }
    }
}
