$('#contactConsultation').on('submit',function(e){
    e.preventDefault();
    let modal = $('#exampleModal');
    let webForm = $(this);
    const formData = new FormData(this);
    $('.is-invalid').removeClass('is-invalid');
    $('invalid-feedback').empty();
    $('#submitBtn').prop('disabled', true).html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
    );
    $
    $.ajax({
        url : 'mail.php',
        method: 'POST',
         data: formData,
        contentType: false,
        processData: false,
        dataType : 'json',
        success:function(res) {
            if(res.success) {
                $('#submitBtn').prop('disabled', false).html('Submit');
                toastr.success(res.message);
                webForm[0].reset();

            }else{
                  $('#submitBtn').prop('disabled', false).html('Submit');
                if(res.errors) {
                    $.each(res.errors,function(field,message){
                        $('#'+ field).addClass('is-invalid');
                        $('#'+field+'_error').text(message);
                    })

                }else{
                    toastr.error(res.message);
                }
            }
        }
    })
})