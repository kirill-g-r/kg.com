<?php

class Controller_Summary extends Controller
{

    function __construct() {

        $this->model = new Model_Summary();
//        $this->view = new View_Charges();
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

        $this->model->data['user_id'] = $_SESSION['user_id'];

        $data = $this->model->get_data();

        $this->view->generate('summary_view.php', 'template_view.php', $data);

    }

    function delete_charge_from_summary_table_get_id() {

        if (isset($_POST['action'])
            && $_POST['action'] == 'delete_charge_from_summary_table'
            && isset($_POST['delete_charge_from_summary_table_id'])
            && $_POST['delete_charge_from_summary_table_id']) {

            return $_POST['delete_charge_from_summary_table_id'];

        }

        return false;

    }
    function delete_charge_from_summary_table() {

        $this->checkUserAccess();

        $this->model->data['user_id'] = $_SESSION['user_id'];

        $this->model->delete_charge_from_summary_table($this->delete_charge_from_summary_table_get_id());
        $data = $this->model->get_data();
        $this->view->generate('', 'summary_view.php', $data);

    }


    function __destruct() {


    }

}
