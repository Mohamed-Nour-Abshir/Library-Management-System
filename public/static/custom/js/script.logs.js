function loadResults(){
    // var url =  "/issue-log";

    var table = $('#issue-logs-table');
    
    var default_tpl = _.template($('#all_logs_display').html());

    $.ajax({
        url : adminurl,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Data</td></tr>');
            } else {
                table.html('');
                // console.log(JSON.stringify(data));
                
                for(var log in data){
                    table.append(default_tpl(data[log]));
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

    $.ajax({
        url : teacherurl,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Logs</td></tr>');
            } else {
                table.html('');
                // console.log(JSON.stringify(data));
                
                for(var log in data){
                    table.append(default_tpl(data[log]));
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

function issueBook(bookID, studentID, selectedForm){
    var url = '/issue-log',
        data = {};

    data.bookID = bookID;
    data.studentID = studentID;
    var _token = $('#_token').val();
    // alert(_token);
    $.ajax({
        type : 'POST',
        data : { 
            data : data,
            _token:_token
        },
        url : url,
        success: function(data) {
            selectedForm.prepend(templates.alert_box( {type: 'success', message: data} ));
            ClearIssueBook();
            $('#issue_student_id').focus();
        },
        error: function(xhr, status, error){

            console.log(xhr);

            var err = jQuery.parseJSON(xhr.responseText).error;
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: err.message} ));
        },
        beforeSend: function() {
            selectedForm.css({'opacity' : '0.4'});
        },
        complete: function() {
            selectedForm.css({'opacity' : '1.0'});
        }
    });
}

function returnBook(bookID, selectedForm){
    var url =  '/issue-log/' + bookID + '/edit';
    $.ajax({
        type : 'GET',
        
        url : url,
        success: function(data) {
            selectedForm.prepend(templates.alert_box( {type: 'success', message: data} ));
            ClearReturn();
            $('#return_book_id').focus();

        },
        error: function(xhr, status, error){
            var err = jQuery.parseJSON(xhr.responseText).error;
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: err.message} ));
        },
        beforeSend: function() {
            selectedForm.css({'opacity' : '0.4'});
        },
        complete: function() {
            selectedForm.css({'opacity' : '1.0'});
        }
    });
}

function ClearReturn(){
    $('#return_book_id').val('') // if you want the value to be empty you will make the like this
}

function ClearIssueBook(){
    $('#issue_book_id').val('') // if you want the value to be empty you will make the like this
    $('#issue_student_id').val('') // if you want the value to be empty you will make the like this
}


$(document).ready(function(){
    $(document).on("click","#issuebook",function(){
        var selectedForm = $(this).parents('form'),
            studentID = selectedForm.find("select[data-form-field~=student-issue-id]").val(),
            bookID = selectedForm.find("select[data-form-field~=book-issue-id]").val();
        
        if(studentID == "" || bookID == ""){
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: "Invalid Data"} ));
        } else {
            issueBook(bookID, studentID, selectedForm);
        }
    });

    $(document).on("click","#returnbook",function(){
        var selectedForm = $(this).parents('form'),
            bookID = selectedForm.find("select[data-form-field~=book-issue-id]").val();
        
        if(bookID == ""){
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: "Invalid Data"} ));
        } else {
            returnBook(bookID, selectedForm);
        }
    });
    
    





    
    
// Get references to the select elements
const studentSelect = document.getElementById('issue_student_id');
const bookSelect = document.getElementById('book-issue-id');

// Add an event listener to the student select element
if (studentSelect && bookSelect) {
studentSelect.addEventListener('change', function () {
    // Get the selected student's book_id and book_name from the data attributes
    const selectedStudent = studentSelect.options[studentSelect.selectedIndex];
    const bookId = selectedStudent.getAttribute('data-book-id');
    const bookName = selectedStudent.getAttribute('data-book-name');
    // const bookName = selectedStudent.textContent;

    // Clear the current options in the book select
    bookSelect.innerHTML = '';

    // If a student is selected, add an option to the book select
    if (bookId && bookName) {
        const option = document.createElement('option');
        option.value = bookId;
        option.textContent = bookName;
        bookSelect.appendChild(option);
    } else {
        // If no student is selected, add an empty option
        const option = document.createElement('option');
        option.value = '';
        bookSelect.appendChild(option);
    }

    // Enable or disable the book select based on whether a student is selected
    bookSelect.disabled = !bookId;
});
}


loadResults();
});



