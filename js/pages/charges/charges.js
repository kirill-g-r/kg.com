
function addNewCharge() {

    $.ajax({
        type: "POST",
        url: "charges",
        data: { type_request:'ajax_request', action: 'addcharge', class: 'Charges', charge_name: $("#charge_name").val(), charge_coast: $("#charge_coast").val() },
        success: function(data){

            $('#template_main_container').html('').html(data);

        }
    });


}
