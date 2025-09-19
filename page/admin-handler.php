<?php
require_once "../model/admin-class.php";

// Show all errors (development only!)
error_reporting(E_ALL);
ini_set('display_errors', 1);

#----------------------------------------------------------------------------------------------#
// global variables
$action['page'] = 'Register-handler';
$action['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'admin';
#----------------------------------------------------------------------------------------------#



#----------------------------------------------------------------------------------------------#

session_start();

// If form submitted
if (isset($_GET['function']) && $_GET['function'] === 'adminRegister') {
    $handler = new activeUser($action);
    $handler->register();
} else {
    new defaultUser($action);
}
#----------------------------------------------------------------------------------------------#



#----------------------------------------------------------------------------------------------#
class defaultUser
{
    private $page = "";
    private $subpage = "";
    protected $user = "";

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];
        $this->user = new admin();
    }

    function register(){
        include "../admin/admin-register.php"; // Show form
        exit;
    }
}
#----------------------------------------------------------------------------------------------#



#----------------------------------------------------------------------------------------------#

class activeUser
{
    private $page = "";
    private $subpage = "";
    protected $user = "";

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];
        $this->user = new admin();
    }

    // handle contact form data
    function register(){
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'user_name'  => $_POST['name'] ?? '',
                    'user_pass' => $_POST['password'] ?? ''
                ];
    
                if ($this->user->adminRegister($data)) {
                    $_SESSION['register'] = true;
                    header("Location: ../views/index.php");
                    exit;
                } else {
                    echo "<script>alert('Failed to save contact message.');</script>";
                }
            }
        }
    }
}
#----------------------------------------------------------------------------------------------#
