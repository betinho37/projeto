@extends('adminlte::page')


@section('content_header')


@stop

@section('content')

<div class="box box-primary col-xs-12">    
    <div class="box-header">
        <div class="row">
            <h3 class="box-title col-md-3">Pesquisado por: <strong>{{ $pesquisa }}</strong></h3>           

            <div class="box-tools col-md-6">
                <form role="form" action="{{ route('publicacao.pesquisar') }}" method="POST" >
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
    </div>

    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
            <tr>
               <th class="col-md-3">Nome</th>
                <th class="col-md-2">Data</th>
                <th class="col-md-2">Titulo</th>
               <th class="col-md-3">Ações</th>
            </tr>

            @foreach($publicacao as $publicacoes)
                <tr>
                    <td> {{ $publicacoes->nome }} </td>
                    <td>{{  date( 'd/m/Y' , strtotime($publicacoes->created_at  ))}}</td>
                    <td> {{ $publicacoes->titulo }} </td>
                    <td><a href="{{@url('api/publicacao').'/' . $publicacoes->id .'/'. 'edit' }}"  class="btn btn-success">Visualizar</a>
                        <a href="{{@url('api/publicacao').'/destroy/'.$publicacoes->id}}" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja excluir este usuario ?');" >Excluir</a>
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
                                    <input type="text" class="form-control" value="{{$publicacoes -> nome }}" disabled>
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
            url: '/api/publicacao/' + id,

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