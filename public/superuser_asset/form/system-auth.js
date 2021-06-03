toastr.options = {
    "timeOut": "1500"
};

function redirect(url){
  window.location.href = url;
}

$('#form-login').submit(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $('#form-login').data('url'),
        data: $('#form-login').serialize(),
        type: 'POST',
        dataType: 'json',
        beforeSend: function() {
          toastr["info"]("Mohon ditunggu");
          $('#submit-login').addClass('hidden');
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
    }).done(function(response) {
        $('#submit-login').removeClass('hidden');

        var time = 0;

        $.each(response.message, function(index, value) {
            setTimeout(function() {
                toastr[((response.status) ? 'success' : 'error')](value);
            }, time);
            time += 500;
        });

        if (response.status) {
          console.log(response.status);
          setTimeout(function() {
            ((response.status) ? redirect(base_url+'/superuser') : redirect(base_url+'/login'))

          }, time += 0);
        }else{
          setTimeout(function() {
              redirect(url_login);
          }, time += 0);

        }

    })
});
