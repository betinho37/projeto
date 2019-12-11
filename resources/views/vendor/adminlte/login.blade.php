
<!DOCTYPE html>
<html  lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{!! config('adminlte.title') !!}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Ionicons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" rel="stylesheet" type="text/css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<!-- Theme style -->
	<link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		{!! config('adminlte.title') !!}
	</div>
	<div class="card">
		<div class="card-body login-card-body">

			@if(session('errors'))
				{{session('errors')}}
			@endif

			<form class="form-login" role="form" method="POST" action="{{ route('login') }}">
				<label for="email">Email <abbr title="campo obrigatório">*</abbr></label>
				<div class="input-group mb-3">
					<input type="email" name="email" id="email" class="form-control" required >
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<label for="password">Senha <abbr title="campo obrigatório">*</abbr></label>
				<div class="input-group mb-3">
					<input type="password"  name="password" id="password" class="form-control" required >
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
					<!-- /.col -->
				</div>
			</form>
			<div class="input-group mb-3">

				<p class="">
					<a  href="/api/register" class="text-center">Registrar</a><br>
					<a  href="/api/password/reset" class="text-center">Esqueceu a senha ? </a>
				</p>

			</div>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<link href="{{ asset('js/jquery.min.js') }}" rel="stylesheet" type="text/css">
<!-- Bootstrap 4 -->
<link href="{{ asset('js/bootstrap.bundle.min.js') }}" rel="stylesheet" type="text/css">
</body>
</html>
