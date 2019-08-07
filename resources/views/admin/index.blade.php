@extends('adminlte::page')

@section('title', 'Museu Virtual')
<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css" >


<script type="javascript">
    $(document).ready(function() {
        jQuery(function($){
        $("#date").mask("99/99/9999");
        $("#telefone").mask("(999) 999-9999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
    })};
</script>



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
                <input type="text" name="pesquisar" class="form-control pull-right" placeholder="Pesquisar...">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="div1"  >
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="open" style="margin-left: -280px;"  >Novo Usuario</button>
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
    <form method="post" action="{{url('api/usuario')}}" id="form">
        @csrf

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row my-9">
                            <div class="col-md-6">
                                <label >Nome</label>
                                <input type="name" class="form-control" id="nome" name="nome" required>

                            </div>
                            <div class="col-md-6">
                                <div class=form-group {{{ $errors->has('email') ? 'has-error' : '' }}}>
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    {{ $errors->first('email', '<span class=help-inline>:message</span>')}}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Telefone</label>
                                <input type="telefone" class="form-control" id="telefone" name="telefone" required>

                            </div>
                            <div class="col-md-6">
                                <label>Estado</label>
                                {!!Form::select('estadoid', $list_estado, null, ['class'=>'form-control '])!!}

                            </div>
                            <div class="col-md-6">
                                <label>Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>

                            </div>
                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>

                            </div>

                            <div class="col-md-6">
                                <label>Senha</label>
                                <input type="password"  name="password" id="password" class="form-control" >
                            </div>
                            <div class="col-md-6">
                                <label>Confirmar Senha</label>
                                <input type="password"  name="password_confirmation" id="password_confirmation" class="form-control"
                                       placeholder="{{ trans('') }}" >

                            </div>
                            <input type="hidden" id="emailValidateNew" name="emailValidate" value="false">
                        </div>

    </form>


    <div class="modal-footer">
        <button  class="btn btn-success" id="ajaxSubmit">Salvar
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Cancelar
        </button>
    </div>

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


    <script type="text/javascript">
        // Adicionar novo usuario
        $(document).on('click', '.add-modal', function() {
            // Campos de entrada
            $('#nome').val('');
            $('#email').val('');
            $('#password').val('');
            $('#password_confirmation').val('');
            $('#cep').val('');
            $('#endereco').val('');
            $('#telefone').val('');
            $('#cidade').val('');
            $('#estadoid').val('');
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'api/usuario',
                message:$('#addModal').reload() ,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nome': $('#nome').val(''),
                    'email':$('#email').val(''),
                    'password':$('#password').val(''),
                    'password_confirmation':$('#password_confirmation').val(''),
                    'cep':$('#cep').val(''),
                    'endereco':$('#endereco').val(''),
                    'telefone':$('#telefone').val(''),
                    'tipousuario':$('#tipousuario').val(''),
                    'cidade':$('#cidade').val(''),
                    'estadoid':$('#estadoid').val(''),
                },

            });
        });
    </script>

@endsection
