@extends('adminlte::page')


@section('content_header')

@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Detalhes do Usuario</h3>
        </div>

        <!-- form start -->
        <form role="form" method="POST" action="{{ route('usuario.store') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group" >
                    <label for="nome">Nome</label>
                    <p>{{ $usuario->nome }}</p>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <p>{{ $usuario->telefone }}</p>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <p>{{ $usuario->email }}</p>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <p>{{ $usuario->endereco }}</p>
                </div>

                <label>
                    {{isset($usuario->tipousuario) && $usuario->tipousuario == 0 ? 'Administrador' : 'Usuário' }}
                </label>


                <div class="box-footer">
                    <a type="button" href="{{@url('api/usuario').'/' . $usuario->id .'/'. 'edit' }}" class="btn btn-warning" btn-sm>Editar</a>
                    <a href="{{ route('usuario.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </form>
    </div>

@stop