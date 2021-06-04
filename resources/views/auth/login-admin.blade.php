<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sevima</title>

  <!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('superuser_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('superuser_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('superuser_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('superuser_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('superuser_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('superuser_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
	<link href="{{ asset('superuser_asset/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- /global stylesheets -->


	<!-- /theme JS files -->

	<style media="screen">
		.btn-block{
			background: #D53231;
			color: white;
		}
		.btn-block:hover{
			background: #D53231;
			color: white;
		}
		.logo-login{
			width: 100%;
			margin-bottom: 0px;
		}
	</style>

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form id="form-login" class="form-horizontal login-form" data-url="{{ route('dologin') }}" autocomplete="off">
          {{csrf_field()}}
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="{{asset('assets/img/logo-sevima.png')}}" class="logo-login" alt="">
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="email" placeholder="Email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script>
		var base_url = '{{ url('') }}';
	  var url_login = '{{ route("auth.index") }}';
	</script>

	<!-- Core JS files -->
	<script src="{{asset('superuser_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('superuser_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('superuser_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('superuser_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('superuser_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('superuser_asset/assets/plugins/toastr/toastr.min.js') }}"></script>
	<script src="{{asset('superuser_asset/global_assets/js/demo_pages/login.js')}}"></script>
	<script src="{{asset('superuser_asset/form/system-auth.js') }}"></script>

</body>
</html>
