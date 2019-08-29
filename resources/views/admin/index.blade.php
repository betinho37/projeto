@extends('adminlte::page')

@section('title', 'Museu Virtual')
<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css" >


@section('content')
    <div class="row"> <!-- MODAL -->
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
        </div> <!-- MODAL -->
    </div>


    <h1 align="center" >Usuarios</h1>

    <div class="box-tools col-md-6" id="header">
        <form role="form" action="{{  route('usuario.pesquisar') }}" method="POST" >
            {{ csrf_field() }}
            <div class="form input-group input-group-sm" >
                <input type="text" name="pesquisar" class="form-control pull-right" placeholder="Consultar...">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="div1"  >
        <a href="/api/usuarios/create" class="btn btn-primary" style="margin-left: -280px;"  >Novo Usuário</a>
    </div><br>

    <div class="card-body table-responsive p-0" >
        <table class="table table-head-fixed">
        <tr style="color:white;background-color:steelblue">
            <th>Nome</th>
            <th>Email</th>
            <th>Opcões</th>
        </tr>
        @foreach($usuario as $usuarios)
            <tr>
                <td>{{$usuarios -> nome }}</td>
                <td>{{$usuarios -> email }}</td>
                <td>
                    <a type="button" href="{{ url('api/usuario', $usuarios->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>Visualizar</a>
                    <a href="{{@url('api/usuario').'/destroy/'.$usuarios->id}}" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja excluir este usuario ?');" >
                        <span class="glyphicon glyphicon-trash"></span>Excluir</a>

            </tr>
        @endforeach
    </table>

    </div>
    <!-- Modal form to add a post -->

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>
@endsection
