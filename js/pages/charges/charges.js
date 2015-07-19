
function addNewCharge() {

    $.ajax({
        type: "POST",
        url: "charges",
        data: { type_request:'ajax_request',
                action: 'addcharge',
                add_charge_name:        $("#add_charge_name").val(),
                add_charge_coast:       $("#add_charge_coast").val(),
                add_charge_currency:    $("#add_charge_currency").val(),
                add_charge_category:    $("#add_charge_category").val()
        },
        success: function(data){

            if (data !== '') {

                $('#template_main_container').html('').html(data);

                $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'ADDED NEW CHARGE',
                    // (string | mandatory) the text inside the notification
                    text: 'New item saved successfully.',
                    // (string | optional) the image to display on the left
                    //image: 'images/favicon/KIRILLGORYUNOV_logo.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    //sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '5000',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class',
                    position: 'bottom-left'

                });

            } else {

                $.gritter.add({

                    title: 'ERROR',
                    text: 'Invalid input data.',
                    time: '5000',
                    class_name: 'my-sticky-class',
                    position: 'bottom-left'

                });

            }

        }
    });


}