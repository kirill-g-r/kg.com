
function addNewCharge() {

    $.ajax({
        type: "POST",
        url: "charges",
        data: { type_request:'ajax', action: 'addcharge', class: 'Charges', charge_name: $("#charge_name").val(), charge_coast: $("#charge_coast").val() },
        success: function(data){

            $('#charges_main_list').html( "DATA IS: " + data );

        }
    });


}
