
function addNewCategory() {

    $.ajax({
        type: "POST",
        url: "settings",
        data: { type_request:'ajax_request',
            action: 'add_new_category',
            add_new_category_name:  $("#add_new_category_name").val()
        },
        success: function(data){

            $('#template_main_container').html('').html(data);

        }
    });

}

function delete_user_category(id_category_for_delete) {

    if (confirm('The record will be deleted. Continue?')) {

        $.ajax({
            type: "POST",
            url: "settings",
            data: {
                type_request: 'ajax_request',
                action: 'delete_user_category',
                delete_user_category_id: id_category_for_delete,
                settings_table_requested_page:         parseInt($('#settings_table_page').attr('value'))
            },
            success: function (data) {

                $('#template_main_container').html('').html(data);

            }
        });

    }

}
