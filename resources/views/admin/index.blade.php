@extends('adminlte::page')

@section('title', 'Museu Virtual')
    <meta name="_token" content="{{csrf_token()}}" />

@section('content')
<div class="col-md-8 col-md-offset-2">
    <h2 class="text-center">Usuarios</h2>
    <br />
    <div class="cold-md-8">
    <button type="button" class="btn btn-success"" data-toggle="modal" data-target="#myModal" id="open">Novo Usuario</button>
    </div><br />
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <th>Nome</th>
                <th>Email</th>
                <th>Opcões</th>
            @foreach($usuario as $usuarios)
                <tr>
                    <td>{{$usuarios -> name }}</td>
                    <td>{{$usuarios -> email }}</td>
                    <td><a href="{{@url('usuario').'/' . $usuarios->id .'/'. 'edit' }}" class="btn btn-primary">Editar</a>
                        <a  href="{{@url('/api/usuario').'/destroy/'.$usuarios->id.''}}" class="btn btn-danger"  onclick="return confirm('Tem certeza de que deseja excluir este item ?');" >Excluir</a></td>
                </tr>
            @endforeach
          </table>

        </div><!-- /.panel-body -->
    </div><!-- /.panel panel-default -->
</div><!-- /.col-md-8 -->
 



<!-- Modal form to add a post -->
    <form method="post" action="{{url('usuario/store')}}" id="form">
  

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
                            <input type="name" class="form-control" id="name" name="name" required>
                            
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
                    <button  class="btn btn-success" id="ajaxSubmit">Save changes
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
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



<!-- AJAX CRUD operations -->
 <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('usuario/store') }}",
                  method: 'post',
                  data: {
                        'name': $('#name').val(''),
                        'email': $('#email').val(''),
                        'password': $('#password').val(''),
                        'cep': $('#cep').val(''),
                        'endereco': $('#endereco').val(''),
                        'telefone': $('#telefone').val(''),
                        'tipousuario': $('#tipousuario').val(''),
                        'cidade': $('#cidade').val(''),
                        'estadoid': $('#estadoid').val(''),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		jQuery('.alert-danger').hide();
                  		$('#open').hide();
                  		$('#myModal').modal('hide');
                  	}
                  }});
               });
            });
      </script>

@endsection
