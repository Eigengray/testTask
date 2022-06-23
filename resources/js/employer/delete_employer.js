function deleteEmployer(id) {
    $.ajax({
        url: `/api/employers/${id}`,
        type: 'delete',
        dataType: 'json',
        success: function (data) {
            $('#employer_card').empty();
            $('.alert-danger').hide()
            $('.alert-success').empty().show().append(data)
            getEmployers()
        },
        error: function (data) {
            $('.alert-success').empty().hide()
            $('.alert-danger').empty().show().append(data);
        },
    });
}

window.deleteEmployer = deleteEmployer
