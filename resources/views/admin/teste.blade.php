@extends('adminlte::page')

@section('title', 'Museu Virtual')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <h2 class="text-center">Manage Posts</h2>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <ul>
                <li><i class="fa fa-file-text-o"></i> All the current Posts</li>
                <a href="#" class="add-modal"><li>Add a Post</li></a>
            </ul>
        </div>
    
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <th>Nome</th>
                <th>Email</th>
                <th>Opcões</th>
            @foreach($usuario as $usuario)
                <tr>
                    
                    <td>{{$usuario -> name }}</td>
                    <td>{{$usuario -> email }}</td>
                    <td><a href="{{@url('usuario').'/' . $usuario->id .'/'. 'edit' }}" class="btn btn-primary">Editar</a>
                        <a  href="{{@url('/api/usuario').'/destroy/'.$usuario->id.''}}" class="btn btn-danger"  onclick="return confirm('Tem certeza de que deseja excluir este item ?');" >Excluir</a></td>
                </tr>
            @endforeach
          </table>
        </div><!-- /.panel-body -->
    </div><!-- /.panel panel-default -->
</div><!-- /.col-md-8 -->



<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="row my-9">
                        <div class="col-md-6">
                            <label >Nome</label>
                            <input type="name" class="form-control" id="new_name" name="name" required>
                            
                        </div>
                        <div class="col-md-6">
                                <label>E-mail</label>
                                <input type="email" class="form-control" id="new_email" name="email" required>
                                
                            </div>
                            <div class="col-md-6">
                            <label>Telefone</label>
                            <input type="telefone" class="form-control" id="new_telefone" name="telefone" required>
                            
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            {!!Form::select('estadoid', $list_estado, null, ['class'=>'form-control '])!!}
                            
                        </div>
                        <div class="col-md-6">
                            <label>Cidade</label>
                            <input type="text" class="form-control" id="new_cidade" name="cidade" required>
                            
                        </div>
                        <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control" id="new_endereco" name="endereco" required>
                                
                            </div>

                        <div class="col-md-6">
                            <label>Senha</label>
                            <input type="password"  name="password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Confirmar Senha</label>
                            <input type="password"  name="password_confirmation" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.retype_password') }}" required>
                            
                        </div>
                        <input type="hidden" id="emailValidateNew" name="emailValidate" value="false">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'></span> Add
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- jQuery -->
{{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

<!-- toastr notifications -->
{{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- icheck checkboxes -->
<script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

<!-- Delay table load until everything else is loaded -->
<script>
    $(window).load(function(){
        $('#postTable').removeAttr('style');
    })
</script>

<script>
    $(document).ready(function(){
        $('.published').iCheck({
            checkboxClass: 'icheckbox_square-yellow',
            radioClass: 'iradio_square-yellow',
            increaseArea: '20%'
        });
        $('.published').on('ifClicked', function(event){
            id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: "",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id
                },
                success: function(data) {
                    // empty
                },
            });
        });
        $('.published').on('ifToggled', function(event) {
            $(this).closest('tr').toggleClass('warning');
        });
    });
    
</script>

<!-- AJAX CRUD operations -->
<script type="text/javascript">
    // add a new post
    $(document).on('click', '.add-modal', function() {
        // Empty input fields
        $('#new_name').val('');
        $('#new_email').val('');
        $('#new_password').val('');
        $('#new_cep').val('');
        $('#new_endereco').val('');
        $('#new_telefone').val('');
        $('#new_cidade').val('');
        $('#estadoid').val('');
        $('.modal-title').text('Add');
        $('#addModal').modal('show');
    });
    $('.modal-footer').on('click', '.add', function() {
        $.ajax({
            type: 'POST',
            url: '/api/usuario',
            data: {
                '_token': $('input[name=_token]').val(),
               'name': $('#name').val('');
                'email':$('#email').val('');
                'password':$('#password').val('');
                'cep':$('#cep').val('');
                'endereco':$('#endereco').val('');
                'telefone':$('#telefone').val('');
                'tipousuario':$('#tipousuario').val('');
                'cidade':$('#cidade').val('');
                'estadoid':$('#estadoid').val('');
                $('.modal-title').text('Add');
                $('#addModal').modal('show');
            },
            success: function(data) {
                $('.password').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                    }, 500);

                    if (data.errors.password) {
                        $('.password').removeClass('hidden');
                        $('.password').text(data.errors.password);
                    }
                } else {
                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                    $('#postTable').prepend("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + " '></td><td>Just now!</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    $('.new_published').iCheck({
                        checkboxClass: 'icheckbox_square-yellow',
                        radioClass: 'iradio_square-yellow',
                        increaseArea: '20%'
                    });
                    $('.new_published').on('ifToggled', function(event){
                        $(this).closest('tr').toggleClass('warning');
                    });
                    $('.new_published').on('ifChanged', function(event){
                        id = $(this).data('id');
                        $.ajax({
                            type: 'POST',
                            url: "",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id': id
                            },
                            success: function(data) {
                                // empty
                            },
                        });
                    });
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            },
        });
    });

    // Show a post
    

    // Edit a post
    
    
    // delete a post
    
</script>


@endsection
