$(document).ready(function() {
    $('#form-import').submit(function(e) {
        e.preventDefault();

        $('#form-import').find("button[type='submit']").prop('disabled', true);

        var post_data_import = new FormData(this);


        if ($('#img').length) {
            var name = $('#img').data('name').toString();
            var img = $('#img')[0].files[0];
            post_data_import.append(name, defaultFor(img, ""));
        }

        $.ajax({
            url: $('#form-import').data('action'),
            data: post_data_import,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
              toastr["info"]("Mohon ditunggu");
              $.blockUI({
                  message: 'Mohon ditunggu',
                  overlayCSS: {
                      backgroundColor: '#1b2024',
                      opacity: 0.8,
                      cursor: 'wait'
                  },
                  css: {
                      border: 0,
                      color: '#fff',
                      padding: 0,
                      backgroundColor: 'transparent'
                  }
              });
            },
            success: function(response) {
              $.unblockUI();
                let toast = toastMessage('success', response.data.message);
                if (response.data.redirect_url) {
                    redirect(response.data.redirect_url, toast += 500);
                }
            },
            error: function(request, status, error) {
              $.unblockUI();
              $('#form-import').find("button[type='submit']").prop('disabled', false);
              toastMessage('error', request.responseJSON.data.message);
            }
        });
    });
});
