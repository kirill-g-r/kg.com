<?php

class Controller_Profile extends Controller
{

    function __construct() {

        $this->view = new View();
    }

    function action_index()
    {

        $this->view->generate('profile_view.php', 'template_view.php');

    }

    function __destruct() {


    }

}