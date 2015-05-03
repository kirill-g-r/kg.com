<?php
/**
 * Created by PhpStorm.
 * User: gkg
 * Date: 26.04.15
 * Time: 23:38
 */

class Controller_Charges extends Controller
{

    function __construct() {

        $this->model = new Model_Charges();
        $this->view = new View();
    }

    function action_index()
    {
#        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
#            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {

        if (isset($_POST['type_request']) && $_POST['type_request'] == 'ajax') {

#            echo 'ITS AJAX!!!!!!!!!!';
#            var_dump($_POST);
#            return 1;

            $this->model->addcharge($_POST);
            $data = $this->model->get_data();
            $this->view->generate('', 'charges_view.php', $data);

            return 1;

        }

        $this->checkUserAccess();
        $data = $this->model->get_data();
        $this->view->generate('', 'charges_view.php', $data);

        return 1;



    }

    function __destruct() {


    }

}
