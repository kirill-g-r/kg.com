<?php

class Controller_Summary extends Controller
{

    public $requested_page;

    function __construct() {

        $this->model = new Model_Summary();
        $this->view = new View();
    }

    function action_index()
    {
        $this->checkUserAccess();

        $this->get_user_id();

        $this->model->get_page_count();

        $this->get_requested_summary_page();

        if ($ajax_action = $this->ajax_request()) {

            // if AJAX-request

            return $this->$ajax_action();

        } else {

            // simple load page

            return $this->load_page();

        }

    }
    function load_page() {

        $this->model->selected_range = $this->get_selected_range();

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

        $this->model->delete_charge_from_summary_table($this->delete_charge_from_summary_table_get_id());
        $this->model->selected_range = $this->get_selected_range();
        $data = $this->model->get_data();
        $this->view->generate('', 'summary_view.php', $data);

    }

    function summary_table_page_change() {

        $this->model->selected_range = $this->get_selected_range();

        $data = $this->model->get_data();

        $this->view->generate('', 'summary_view.php', $data);

    }

    public function get_requested_summary_page() {

        if (isset($_POST['summary_table_requested_page'])
            && $_POST['summary_table_requested_page']
            && $_POST['summary_table_requested_page'] <= $this->model->requested_page_count) {

            $this->model->requested_page = $_POST['summary_table_requested_page'];

        } else {

            $this->model->requested_page = 1;

        }

    }

    function get_selected_range() {

        return array(
                        'from'  =>  ($this->model->requested_page - 1) . '0',
                        'count' =>  '10'
                    );

        return array(
                        'from'  =>  '0',
                        'count' =>  '10'
        );

    }

    function get_user_id() {

        $this->model->data['user_id'] = $_SESSION['user_id'];

    }

    function __destruct() {


    }

}
