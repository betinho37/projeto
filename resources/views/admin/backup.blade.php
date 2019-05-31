
<div class="modal" id="NewUserModal">
    <form class="form-horizontal" method="post" action="/api/usuario" data-toggle="validator">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Novo Usuário</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
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
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="newUserButton">Registrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>











@extends('adminlte::page')

@section('title', 'Museu Virtual')

@section('content')
<div class="div1" style="padding:30px">

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
</div>








<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script type="text/javascript">
    var url = "<?php echo route('usuario')?>";
    var csrf = '{{ csrf_token() }}';
</script>
@endsection
