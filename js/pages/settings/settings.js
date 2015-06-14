
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
