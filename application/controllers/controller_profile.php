<?php

class Controller_Profile extends Controller {

    public $data;
    public $new_profile_data;

    function __construct() {

        $this->model = new Model_Profile();
        $this->view = new View();

    }

    function action_index() {

        $this->checkUserAccess();

        if ($ajax_action = $this->ajax_request()) {

            // if AJAX-request

            return $this->$ajax_action();

        } else {

            // simple load page

            return $this->load_page();

        }

    }

    function update_profile() {


        $this->model->data['user_id'] = $_SESSION['user_id'];

        $this->model->update_profile($this->parse_new_profile_data());

        $this->session_destroy();

    }

    function parse_new_profile_data() {

        $this->new_profile_data['username'] =   $_POST['profile_username'];
        $this->new_profile_data['password'] =   $_POST['profile_password'];
        $this->new_profile_data['email']    =   $_POST['profile_email'];

        foreach ($this->new_profile_data as $key => $ch) {

            $this->new_profile_data[$key] = trim(htmlspecialchars(stripcslashes($ch)));

        }

        return $this->new_profile_data;

    }

    function load_page() {

        $this->data = $this->getProfileData();
        $this->view->generate('profile_view.php', 'template_view.php', $this->data);

    }

    function getProfileData() {

        if (isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_SESSION['user_id']) ) {

            $profile_data['username']       = $_COOKIE['username'];
            $profile_data['password']       = $_COOKIE['password'];
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

    function session_destroy() {

        $_SESSION = array();
        session_destroy();

        header('Location:login');

    }

    function upload_avatar() {

        $this->data['username'] = 'fuck';
        $this->view->generate('profile_view.php', 'template_view.php', $this->data);

    }

    function __destruct() {


    }

}