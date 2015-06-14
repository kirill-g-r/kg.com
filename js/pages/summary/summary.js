function summary_table_page_change(type) {

    if (type == 'foward') {

        requested_page = parseInt($('#summary_table_page').attr('value')) + 1;

    } else {

        requested_page = parseInt($('#summary_table_page').attr('value')) - 1;

    }

    $.ajax({
        type: "POST",
        url: "summary",
        data: { type_request:'ajax_request',
            action: 'summary_table_page_change',
            summary_table_requested_page:         requested_page
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
                delete_charge_from_summary_table_id: id_charge_dor_delete,
                summary_table_requested_page:         parseInt($('#summary_table_page').attr('value'))
            },
            success: function (data) {

                $('#template_main_container').html('').html(data);

            }
        });

    }

}
