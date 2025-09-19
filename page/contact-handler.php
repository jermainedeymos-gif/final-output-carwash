<?php
require_once "../model/contact-class.php";


#----------------------------------------------------------------------------------------------#
// global variables
$action['page'] = 'Contact-handler';
$action['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'contact';
#----------------------------------------------------------------------------------------------#



#----------------------------------------------------------------------------------------------#

session_start();

// If form submitted
if (isset($_GET['function']) && $_GET['function'] === 'sendSMS') {
    $handler = new activeUser($action);
    $handler->session_contact();
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
        $this->user = new Contact();

        include "../sidenav/contact.php"; // Show form
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
        $this->user = new Contact();
    }

    // handle contact form data
    function session_contact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_name'  => $_POST['name'] ?? '',
                'user_email' => $_POST['email'] ?? '',
                'subject'    => $_POST['subject'] ?? '',
                'message'    => $_POST['message'] ?? ''
            ];

            if ($this->user->sendSMS($data)) {
                $_SESSION['session_contact'] = true;
                header("Location: ../views/index.php");
                exit;
            } else {
                echo "<script>alert('Failed to save contact message.');</script>";
            }
        }
    }
}
#----------------------------------------------------------------------------------------------#
