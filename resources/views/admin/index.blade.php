@extends('adminlte::page')

@section('title', 'Museu Virtual')
<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css" >

@section('content')
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

    <div class="div1" style="margin-right: 784px;">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="open">Novo Usuario</button>
    </div>
    
    

    <table align="center" class="table"><p></p>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Opcões</th>
            </tr>
            @foreach($usuario as $usuarios)
                <tr>
                    <td>{{$usuarios -> nome }}</td>
                    <td>{{$usuarios -> email }}</td>
                    <td><a href="{{@url('usuario').'/' . $usuarios->id .'/'. 'edit' }}" class="btn btn-primary">Editar</a>
                        <a type="button" href="{{ url('api/usuario', $usuarios->id) }}" class="btn btn-success" btn-sm>Visualizar</a>
                        <button class="delete-modal btn btn-danger" data-id="{{$usuarios->id}}" data-name="{{ $usuarios->nome}}">
                        <span class="glyphicon glyphicon-trash"></span> Delete</button>                
                    </tr>
            @endforeach
    </table>

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
                                <label>E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                
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
                            placeholder="{{ trans('adminlte::adminlte.retype_password') }}" >
                            
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
            </div>
        </div>
    </div>
</div>


<div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Tem certeza de que deseja excluir este usuario?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$usuarios -> nome }}" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Deletar
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Caneclar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
        </script>
        <!-- Latest compiled and minified JavaScript -->

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
                success: function(data) {
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    } else {
                        $('.error').remove();
                        $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    }
                },
            });
        });


        // Deletar usuario
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id').val($(this).data('id'));
            $('#nome').val($(this).data('nome'));
            $('#deleteModal').modal('show');
            id = $('#id').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: '/api/usuario/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    window.location.reload();
                }
                
            });
        });  
</script>

@endsection
