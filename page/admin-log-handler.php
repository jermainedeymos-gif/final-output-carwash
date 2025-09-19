<?php
//model
include '../model/admin-class.php';

//global variable
$page['page'] = 'Authenticate';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'login';


//check for an action
if (isset($_GET['function'])) {
    //instanciate
    new ActiveAuthenticate($page);
} else {
    //instanciate
    new Authenticate($page);
}

#------CLASSES
//the default class
class Authenticate
{
    //encapsulation
    private $page = '';
    private $subpage = '';

    //constructor
    function __construct($page)
    {
        $this->page = $page['page']; //assigned the property values
        $this->subpage = $page['subpage']; //assigned the property values

        //run the method
        $this->{$page['subpage']}();
    }

    function adminLogin()
    {
        include '../admin/admin-login.php'; // get the views
    }
}

//if there is an action
class ActiveAuthenticate
{
    //encapsulation
    private $page = '';
    private $subpage = '';
    protected $admin = '';

    //constructor
    function __construct($page)
    {
        $this->page = $page['page']; //assigned the property values
        $this->subpage = $page['subpage']; //assigned the property values
        $this->admin = new admin();

        //run the method
        $this->{$_GET['function']}();
    }

    function adminLogin()

    {
        $username = $_POST['Name'] ?? '';     // must match form input name
        $password = $_POST['password'] ?? '';
    
        $login = $this->admin->adminLogin($username); // returns 1 row or false
    
        if ($login && password_verify($password, $login['user_pass'])) {
            session_start();
    
            $_SESSION['loggedIn_id'] = $login['id'];        // or 'user_name'
            $_SESSION['admin_name'] = $login['user_name'];
            $_SESSION['user_type']  = $login['user_type'];
    
            header("Location: ../admin/admin-dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid Username or Password!');</script>";
            include "../admin/admin-login.php";
        }
}
}