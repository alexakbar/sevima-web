function deleteIt(that) {
  var swalInit = swal.mixin({
          buttonsStyling: false,
          confirmButtonClass: 'btn btn-primary',
          cancelButtonClass: 'btn btn-light'
      });

  swalInit({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
  }).then(function(result) {
      if(result.value) {
        var action = $(that).data('action');
        $.ajaxSetup({
              headers:
              { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
          });
          $.ajax({
              url: action,
              contentType: false,
              cache: false,
              processData: false,
              dataType: 'json',
              type: 'POST',
              success: function(response) {
                let toast = toastMessage('success', response.data.message);
                if (response.data.redirect_url) {
                    redirect(response.data.redirect_url, toast += 500);
                }else{
                  location.reload();
                }
              },
              error: function(request, status, error) {
                toastMessage('error', request.responseJSON.data.message);
              }
          });
      }
  });
}
