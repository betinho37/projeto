@extends('adminlte::page')


@section('title', 'Museu Virtual')

<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @if ($message = Session::get('sucesso'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ $message }}</h4>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-close"></i>{{ $message }}</h4>
                </div>
            @endif
        </div>
    </div>
    <h1 align="center">Publicações</h1>
    <div class="box-tools col-md-6" id="header">
        <form role="form" action="{{  route('publicacao.pesquisar') }}" method="POST" >
            {{ csrf_field() }}
            <div class="form input-group input-group-sm" >
                <input type="text" name="pesquisar" class="form-control pull-right" placeholder="Consultar...">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div id="div1">
        <div id="div2" >
            <a class="btn btn-primary" href="create">Nova Publicação</a>
        </div>
        <br>
        <div class="card-body table-responsive p-0">
            <table  class="table table-head-fixed">
                    <tr id="tr1">
                        <th>Nome</th>
                        <th>Titulo da Imagem</th>
                        <th>Data</th>
                        <th>Situação</th>
                        <th>Publicado</th>
                        <th>Opcões</th>
                    </tr>
                @foreach($publicacao as $publicacoes)
                    <tr>
                        <td>{{$publicacoes -> nome }}</td>
                        <td>{{$publicacoes -> titulo }}</td>
                        <td>{{  date( 'd/m/Y' , strtotime($publicacoes->created_at  ))}}</td>
                        <td>{{isset($publicacoes->situacao) && $publicacoes->situacao == 0 ? 'Pendente' : 'Publicado' }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $publicacoes->created_at)->diffForHumans() }}</td>
                        <td>
                            <a type="button" href="{{@url('api/publicacao').'/' . $publicacoes->id .'/'. 'edit' }}" class="btn btn-success">Visualizar</a>
                            <a href="{{@url('api/publicacao').'/destroy/'.$publicacoes->id}}" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja excluir este usuario ?');" >Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $publicacao->links() }}
        </div>
@endsection
