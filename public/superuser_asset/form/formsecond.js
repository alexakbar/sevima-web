$(document).ready(function() {
    $('.superuser-form2').submit(function(e) {
        e.preventDefault();

        $('.superuser-form2').find("button[type='submit']").prop('disabled', true);

        var post_data = new FormData(this);


        if ($('#img').length) {
            var name = $('#img').data('name').toString();
            var img = $('#img')[0].files[0];
            post_data.append(name, defaultFor(img, ""));
        }

        $.ajax({
            url: $('.superuser-form2').data('action'),
            data: post_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
              toastr["info"]("Mohon ditunggu");
              $.blockUI({
                  message: 'Please Wait',
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
              $('.superuser-form2').find("button[type='submit']").prop('disabled', false);
              toastMessage('error', request.responseJSON.data.message);
            }
        });
    });

    $('.superuser-form3').submit(function(e) {
        e.preventDefault();

        $('.superuser-form3').find("button[type='submit']").prop('disabled', true);

        var post_data = new FormData(this);

        if ($('#img').length) {
            var name = $('#img').data('name').toString();
            var img = $('#img')[0].files[0];
            post_data.append(name, defaultFor(img, ""));
        }

        $.ajax({
            url: $('.superuser-form3').data('action'),
            data: post_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
              toastr["info"]("Mohon ditunggu");
              $.blockUI({
                  message: 'Please Wait',
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
              $('.superuser-form3').find("button[type='submit']").prop('disabled', false);
              toastMessage('error', request.responseJSON.data.message);
            }
        });
    });

    $('.superuser-form4').submit(function(e) {
        e.preventDefault();

        $('.superuser-form4').find("button[type='submit']").prop('disabled', true);

        var post_data = new FormData(this);


        if ($('#img').length) {
            var name = $('#img').data('name').toString();
            var img = $('#img')[0].files[0];
            post_data.append(name, defaultFor(img, ""));
        }

        $.ajax({
            url: $('.superuser-form4').data('action'),
            data: post_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
              toastr["info"]("Mohon ditunggu");
              $.blockUI({
                  message: 'Please Wait',
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
              $('.superuser-form4').find("button[type='submit']").prop('disabled', false);
              toastMessage('error', request.responseJSON.data.message);
            }
        });
    });

    $('#superuser-form5').submit(function(e) {
        e.preventDefault();

        $('#superuser-form5').find("button[type='submit']").prop('disabled', true);

        var post_data = new FormData(this);


        if ($('#img').length) {
            var name = $('#img').data('name').toString();
            var img = $('#img')[0].files[0];
            post_data.append(name, defaultFor(img, ""));
        }

        $.ajax({
            url: $('#superuser-form5').data('action'),
            data: post_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
              toastr["info"]("Mohon ditunggu");
              $.blockUI({
                  message: 'Please Wait',
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
              $('#superuser-form5').find("button[type='submit']").prop('disabled', false);
              toastMessage('error', request.responseJSON.data.message);
            }
        });
    });
});
