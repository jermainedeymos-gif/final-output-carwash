<?php
require_once "../model/modal-class.php";

#------------------------------------------------------------------------#
//global variables
$action['page'] = 'Model-handler';
$action['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Model';
#------------------------------------------------------------------------#



#------------------------------------------------------------------------#
session_start();

// If form submitted
if (isset($_GET['function']) && $_GET['function'] === 'addBooking') {
    $handler = new activeBooking($action);
    $handler->session_modal();
} else {
    new defaultBooking($action);
}
#------------------------------------------------------------------------#



#------------------------------------------------------------------------#
class defaultBooking
{
    private $page = "";
    private $subpage = "";
    protected $user = "";

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];
        $this->user = new Modal();

        include "../views/index.php"; //Show the Modal Form
        exit;
    }
}
#------------------------------------------------------------------------#



#------------------------------------------------------------------------#
class activeBooking
{
    private $page = "";
    private $subpage = "";
    protected $user = "";

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];
        $this->user = new Modal();
    }

    // Handle the form data for submission to insert the form data into db table
    function session_modal(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'booking_type' => $_POST['plan'] ?? '',
                'full_name' => $_POST['name'] ?? '',
                'contact_no' => $_POST['contact'] ?? '',
                'car_model' => $_POST['carModel'] ?? '',
                'booking_date' => $_POST['date'] ?? '',
                'message' => $_POST['message'] ?? '',
            ];

            if ($this->user->addBooking($data)) {
                $_SESSION['session_modal'] = true;
                header("Location: ../views/index.php");
                exit;
            } else {
                echo "<script>alert('Failed to add booking!.');</script>";
            }
        }
    }
}
#----------------------------------------------------------------------