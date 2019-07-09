@extends('adminlte::page')


@section('content_header')
    <h1>Resultado</h1>
@stop

@section('content')

<div class="box box-primary col-xs-12">    
    <div class="box-header">
        <div class="row">
            <h3 class="box-title col-md-3">Pesquisado por: <strong>{{ $pesquisa }}</strong></h3>           

            <div class="box-tools col-md-6">
                <form role="form" action="{{ route('usuario.pesquisar') }}" method="POST" >
                    {{ csrf_field() }}
                    <div class="form input-group input-group-sm" >
                    <input type="text" name="pesquisar" class="form-control pull-right" placeholder="Pesquisar...">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </form>
            </div>

            <div class="col-md-1">
                
            </div>

        </div>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
            <tr>
               <th class="col-md-1">ID</th>
               <th class="col-md-3">Nome</th>
               <th class="col-md-2">Telefone</th>
               <th class="col-md-3">E-mail</th>
               <th class="col-md-3">Ações</th>
            </tr>

            @foreach ($usuario as $usuarios)
            <tr>                
                <td> {{ $usuarios->id }} </td>
                <td> {{ $usuarios->nome }} </td>
                <td> {{ $usuarios->telefone }} </td>
                <td> {{ $usuarios->email }} </td>
                <td><a href="{{@url('api/usuario').'/' . $usuarios->id .'/'. 'edit' }}" class="btn btn-primary">Editar</a>
                    <a type="button" href="{{ url('api/usuario', $usuarios->id) }}" class="btn btn-success" btn-sm>Visualizar</a>
                    <button class="delete-modal btn btn-danger" data-id="{{$usuarios->id}}" data-name="{{ $usuarios->nome}}">
                        <span class="glyphicon glyphicon-trash"></span> Deletar</button>
            </tr>
            </tr>
            @endforeach
            </tbody>
        </table>
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
                                <span class='glyphicon glyphicon-remove'></span> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
        </div>

    </div><!-- /.box-body -->
</div><!-- /.box -->
<script type="text/javascript">

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
                'id': $('id').val(),

            },
            success: function(data) {
                window.location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }

        });
    });


</script>

@stop