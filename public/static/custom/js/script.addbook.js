function loadResults(){

    var url =  "/books?category_id=" + $('#category_fill').val();
    // alert(url);
    var table = $('#all-books');
    
    // alert(table);
    var default_tpl = _.template($('#allbooks_show').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Books in this category</td></tr>');
            } else {
                table.html('');
                for (var book in data) {
                    table.append(default_tpl(data[book]));
                }
            }
        },
        beforeSend : function(){
            table.css({'opacity' : 0.4});
        },
        complete : function() {
            table.css({'opacity' : 1.0});
        }
    });
}

$(document).ready(function(){

    $("#category_fill").change(function(){

        var url =  "/bookBycategory/" + $('#category_fill').val();
        // alert(url);
        var table = $('#all-books');
        
        // alert(table);
        var default_tpl = _.template($('#allbooks_show').html());
    
        $.ajax({
            url : url,
            success : function(data){
                console.log(data);
                if($.isEmptyObject(data)){
                    table.html('<tr><td colspan="99">No Books in this category</td></tr>');
                } else {
                    table.html('');
                    for (var book in data) {
                        table.append(default_tpl(data[book]));
                    }
                }
            },
            beforeSend : function(){
                table.css({'opacity' : 0.4});
            },
            complete : function() {
                table.css({'opacity' : 1.0});
            }
        });
    });

    $(document).on("click", "#addbooks", function() {
        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };
    
        // Get form data
        var title = f$('input[data-form-field~=title]').val();
        var author = f$('input[data-form-field~=author]').val();
        var description = f$('textarea[data-form-field~=description]').val();
        var category_id = f$('select[data-form-field~=category]').val();
        var number = parseInt(f$('input[data-form-field~=number]').val());
        var image = f$('input[data-form-field~=image]').prop('files')[0];
        var auth_user = f$('input[data-form-field~=auth_user]').val();
        var _token = f$('input[data-form-field~=token]').val();
        
    
        // Create FormData object
        var formData = new FormData();
        formData.append('title', title);
        formData.append('author', author);
        formData.append('description', description);
        formData.append('category_id', category_id);
        formData.append('number', number);
        formData.append('image', image);
        formData.append('auth_user', auth_user);
        formData.append('_token', _token);
        
        
        // Validate form data
        if (title == "" || author == "" || description == "" || number == null || image == undefined) {
            module_body.prepend(templates.alert_box({type: 'danger', message: 'Book Details Not Complete'}));
            send_flag = false;
        }
    
        if (send_flag == true) {
            $.ajax({
                type: 'POST',
                data: formData,
                url: '/books',
                contentType: false, // Set content type to false for FormData
                processData: false, // Disable processData for FormData
                success: function(data) {
                    module_body.prepend(templates.alert_box({type: 'success', message: data}));
                    clearform();
                },
                
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box({type: 'danger', message: err.error.message}));
                },
                beforeSend: function() {
                    form.css({'opacity': '0.4'});
                },
                complete: function() {
                    form.css({'opacity': '1.0'});
                }
            });
        }
    });
     // add books to database


    loadResults();

});

function clearform(){
    $('#title').val('');
    $('#author').val('');
    $('#description').val('');
    $('#number').val('');
    $('#category').val('');
}

// Handle click events for edit and delete buttons
$(document).on('click', '.btn-edit', function() {
    var bookId = $(this).data('book-id');
    window.location.href = '/books/' + bookId + '/edit';
});

$(document).on('click', '.btn-delete', function() {
    var bookId = $(this).data('book-id');
    // Send an AJAX request to delete the book
    $.ajax({
        url: '/books/' + bookId,
        type: 'DELETE',
        success: function(response) {
            // Handle success, you can show a success message or reload the table
            alert('Book deleted successfully.');
            // Reload the table data
            loadBooksData();
        },
        error: function(xhr) {
            // Handle error, display an error message if needed
            alert('Error deleting the book.');
        }
    });
});
