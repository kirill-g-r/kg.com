function aboutSendMail() {

    $.ajax({
        type: "POST",
        url: "about",
        data: { type_request:'ajax_request',
            action: 'about_send_mail',
            about_send_mail_name:       $("#about_send_mail_name").val(),
            about_send_mail_email:      $("#about_send_mail_email").val(),
            about_send_mail_message:    $("#about_send_mail_message").val()
        },
        success: function(data){

            $('#template_main_container').html('').html(data);

        }
    });

}