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

<style>
	.label {
		content:" *";
		color: red;
	}


</style>
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
							<label for="nome">Email <abbr title="campo obrigatório">*</abbr></label>
							<input type="email" id="inputEmail" name="email" id="email" class="form-control" required >

						</div>

						<div class="form-group has-feedback">
							<label for="nome">Senha <abbr title="campo obrigatório">*</abbr></label>
							<input type="password" id="inputPassword" name="password" id="password" class="form-control" required >

						</div>
						<div class="custom-control custom-checkbox mb-3">
								<a href="/api/password/reset" >Esqueci minha senha</a>
						</div>
						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>

						<a href="/api/register" class="btn btn-lg btn-primary btn-block text-uppercase" role="button" aria-pressed="true">Registrar</a>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>