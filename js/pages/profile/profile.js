
function updateProfile() {

    $.ajax({
        type: "POST",
        url: "profile",
        data: { type_request:'ajax_request',
                action: 'update_profile',
                profile_username:       $("#profile_username").val(),
                profile_password:       $("#profile_password").val(),
                profile_email:          $("#profile_email").val()
        },
        success: function(data){

            $('#template_main_container').html('').html(data);

        }
    });

}

function uploadAvatar() {

    $.ajax({
        type: "POST",
        url: "profile",
        data: { type_request:'ajax_request',
            action: 'upload_avatar'
//            profile_email:          $("#profile_email").val()
        },
        success: function(data){

            $('#template_main_container').html('').html(data);

        }
    });

}