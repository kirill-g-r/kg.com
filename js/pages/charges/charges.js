
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

function delete_charge_from_summary_table(id_charge_dor_delete) {

    if (confirm('The record will be deleted. Continue?')) {

        $.ajax({
            type: "POST",
            url: "summary",
            data: {
                type_request: 'ajax_request',
                action: 'delete_charge_from_summary_table',
                delete_charge_from_summary_table_id: id_charge_dor_delete
            },
            success: function (data) {

                $('#template_main_container').html('').html(data);

            }
        });

    }

}

function summary_table_month_back() {

    alert($('#summary_table_month'));

}
