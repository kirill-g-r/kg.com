<?php

class Controller_Profile extends Controller
{

    function __construct() {

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

    function update_profile() {

        echo '<div id="xxx">Release later</div>';

    }

    function load_page() {

        $data = $this->getProfileData();

        $this->view->generate('profile_view.php', 'template_view.php', $data);

    }

    function getProfileData() {

        session_start();

        if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['user_id']) ) {

            $profile_data['username']       = $_SESSION['username'];
            $profile_data['password']       = $_SESSION['password'];
            $profile_data['email']          = $_SESSION['email'];
            $profile_data['user_id']        = $_SESSION['user_id'];
            $profile_data['avatar_image']   = $this->getAvatarImage( $profile_data['user_id'] );

            return $profile_data;

        } else {

            header('Location:/login');

        }

    }
    function getAvatarImage( $user_id = false ) {

        if ($user_id) {

            return 'images/users/'.$user_id.'/'.$user_id.'_avatar.jpg';

        }

    }

    function __destruct() {


    }

}