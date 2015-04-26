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

#        $this->model = new Model_Portfolio();
        $this->view = new View();
    }

    function action_index()
    {
        $this->checkUserAccess();
#        $data = $this->model->get_data();
        $this->view->generate('', 'charges_view.php');
    }
    function __destruct() {


    }

}
