<?php

class Controller_Charges extends Controller
{

    function __construct() {

        $this->model = new Model_Charges();
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

        $this->checkUserAccess();
        $data = $this->model->get_data();

        $this->view->generate('charges_view.php', 'template_view.php', $data);

    }

    function addcharge() {

        $this->checkUserAccess();
        $this->model->addcharge($_POST);
        $data = $this->model->get_data();

        $this->view->generate('', 'charges_view.php', $data);

    }


    function __destruct() {


    }

}
