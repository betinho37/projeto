<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/css/login.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>
<div class="container">

	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-login my-5">
				<div class="card-body">
					<h5 class="card-title text-center">{{ __('Museu Virtual') }}</h5>
					@if(session('errors'))
						{{session('errors')}}
					@endif

					<form class="form-login" role="form" method="POST" action="{{ route('login') }}">


						{{ csrf_field() }}
						<div class="form-group has-feedback">
							<input type="email" id="inputEmail" name="email" id="email" class="form-control" placeholder="E-Mai" required autofocus value="">

						</div>

						<div class="form-group has-feedback">
							<input type="password" id="inputPassword" name="password" id="password" class="form-control" placeholder="Senha" required value="">

						</div>
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="remember_token" {{ old('remember_token') ? 'checked' : '' }}>
							<label class="custom-control-label" for="remember_token">Lembrar senha</label>

						</div>
						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>