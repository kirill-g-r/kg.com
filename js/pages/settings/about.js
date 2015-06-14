
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

            $('#template_main_container').html('').html(data);

        }
    });

}
