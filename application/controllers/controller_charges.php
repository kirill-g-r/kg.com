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

        $this->model->addcharge( $this->parse_new_charge() );
        $data = $this->model->get_data();
        $this->view->generate('', 'charges_view.php', $data);

    }
    function parse_new_charge() {

        $charge['name'] =       $_POST['add_charge_name'];
        $charge['coast'] =      $_POST['add_charge_coast'];
        $charge['currency'] =   $_POST['add_charge_currency'];
        $charge['category'] =   $_POST['add_charge_category'];

        foreach ($charge as $key => $ch) {

            $charge[$key] = trim(htmlspecialchars(stripcslashes($ch)));

        }

        return $charge;

    }


    function __destruct() {


    }

}
