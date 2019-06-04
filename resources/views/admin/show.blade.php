@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Usuarios</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Detalhes do Usuario</li>
    </ol>
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
                <label for="whatsapp">WhatsApp</label>
                <p>{{ $usuario->whatsapp }}</p>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <p>{{ $usuario->email }}</p>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <p>{{ $usuario->endereco }}</p>
            </div>
            
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <p>{{ $usuario->cidade }}</p>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                {!!Form::select('estadoid', $list_estado, $usuario->estadoid, ['class'=>'form-control'])!!}
            </div>

            <div class="box-footer">
                <a type="button" href="{{@url('usuario').'/' . $usuario->id .'/'. 'edit' }}" class="btn btn-warning" btn-sm>Editar</a>
                <a href="{{ route('usuario.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
</div>
    
@stop