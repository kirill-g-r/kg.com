<?php

class Controller_Settings extends Controller
{

    function __construct() {

        $this->model = new Model_Settings();
//        $this->view = new View_Charges();
        $this->view = new View();
    }

    function action_index()
    {

        $this->checkUserAccess();

        $this->get_user_id();

        if ($ajax_action = $this->ajax_request()) {

            // if AJAX-request

            return $this->$ajax_action();

        } else {

            // simple load page

            return $this->load_page();

        }

    }
    function load_page() {

        $data = $this->model->get_data();

        $this->view->generate('settings_view.php', 'template_view.php', $data);

    }

    function add_new_category() {

        $this->model->add_new_category( $this->parse_new_category() );
        $data = $this->model->get_data();
        $this->view->generate('', 'settings_view.php', $data);

    }
    function parse_new_category() {

        $category['category']   =   $_POST['add_new_category_name'];

        foreach ($category as $key => $ch) {

            $category[$key] = trim(htmlspecialchars(stripcslashes($ch)));

        }

        return $category;

    }

    function delete_user_category_get_id() {

        if (isset($_POST['action'])
            && $_POST['action'] == 'delete_user_category'
            && isset($_POST['delete_user_category_id'])
            && $_POST['delete_user_category_id']) {

            return $_POST['delete_user_category_id'];

        }

        return false;

    }
    function delete_user_category() {

        $this->model->delete_user_category($this->delete_user_category_get_id());

        $data = $this->model->get_data();
        $this->view->generate('', 'settings_view.php', $data);

    }

    function get_user_id() {

        $this->model->data['user_id'] = $_SESSION['user_id'];

    }

    function __destruct() {


    }

}
