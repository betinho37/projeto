@extends('adminlte::page')

@section('content')
	<div class="box box-primary">


		<h4 align="Center" >Editar Usuário: {{$usuario->nome}} </h4>
		<div class="div1" style="padding:30px">

			{!!Form::open(['route'=>['usuario.update', $usuario->id ], 'method'=>'put'])!!}

			<div class="form-group" >
				<strong>Nome:</strong>
				{!!Form::text('name', $usuario->nome, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group" >
				<strong>Email:</strong>
				{!!Form::text('email', $usuario->email, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group" >
				<strong>Telefone:</strong>
				{!!Form::text('telefone', $usuario->telefone, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group" >
				<strong>Cidade:</strong>
				{!!Form::text('cidade', $usuario->cidade, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group" >
				<strong>Estado:</strong>
				{!!Form::select('estadoid', $list_estado, $usuario->estadoid, ['class'=>'form-control'])!!}
			</div>

			<div class="form-group" >
				<strong>CEP:</strong>
				{!!Form::text('cep', $usuario->cep, ['class'=>'form-control'])!!}
			</div>

			<div class="form-group" >
				<strong>Nova Senha:</strong><br>
				{!!Form::text('password', null, ['class'=>'form-control'])!!}
			</div>

			<div  align="center">
				{!!Form::label('tipousuario', 'Tipo de Usuário:')!!}

				<label>
					<input type="radio" name="tipousuario" value="0"
						   {{isset($usuario->tipousuario) && $usuario->tipousuario == 0 ? 'checked' : '' }}
						   required>Administrador
				</label>
				<label>
					<input type="radio" name="tipousuario" value="1"
						   {{isset($usuario->tipousuario) && $usuario->tipousuario == 1 ? 'checked' : '' }}
						   required>Usuário
				</label><br>
			</div>




			<div align="Center" class="form-group" >
				{!!Form::submit('Salvar', ['class="btn btn-primary"'])!!}
				<a href="/api/usuario" class="btn btn-primary">Cancelar</a>
			</div>
			{!! Form::close() !!}

		</div>
@endsection
