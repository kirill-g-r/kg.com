<?php

class Controller_About extends Controller
{

    function __construct() {

        $this->model = new Model_About();
        $this->view = new View();
    }

    function action_index()
    {
        if ($ajax_action = $this->ajax_request()) {

            // if AJAX-request

            return $this->$ajax_action();

        } else {

            // simple load page

            return $this->load_page();

        }

    }
    function load_page() {

        $this->view->generate('about_view.php', 'template_view.php');

    }

    function about_send_mail() {

        $this->checkUserAccess();

        $this->about_parse_and_send();

        $this->view->generate('', 'about_view.php');

    }
    function about_parse_and_send() {

        $to         = $_POST['about_send_mail_name'];
        $subject    = $_POST['about_send_mail_name'];
        $message    = $_POST['about_send_mail_message'];

        if (empty($message)) {

            $message = 'EMPTY MESSAGE';

        }

        mail("goryunov.k@mail.ru", "ABOUT_SEND_MAIL", $message);

    }


    function __destruct() {


    }

}
