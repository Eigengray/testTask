let isSubmitted = true
$('#employer_add_btn').click(function (e) {
    $("form#employer_form :input").each(function(){
        let input = $(this);
        if ( !input.is(":hidden") ){
            input[0].classList.remove('is-invalid')
            if ( input[0].value.length === 0 && input.attr('id') !== 'photo' && input.attr('name') !== 'lastName'){
                input[0].classList.add('is-invalid')
                isSubmitted = false
            }
        }
    });
    if (isSubmitted) {
        let formData = new FormData($("#employer_form")[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'api/employers',
            type: 'post',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.split(' ')[0] == 'Error:') {
                    $('.alert-success').empty().hide()
                    $('.alert-danger').empty().show().append(data);
                } else {
                    $('.alert-danger').hide()
                    $('.alert-success').empty().show().append(data)
                    $('form#employer_form').trigger("reset");
                    let searchParams = new URLSearchParams(window.location.search)
                    if (searchParams.has('page')) {
                        console.log(searchParams.get('page'))
                        getEmployers(searchParams.get('page'))
                    } else {
                        getEmployers(1)
                    }

                }
            },
            error: function (data) {
                $('.alert-success').empty().hide()
                $('.alert-danger').empty().show().append(data);
            },
        });
    }

})

