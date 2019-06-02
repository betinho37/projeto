@extends('adminlte::page')

@section('title', 'Museu Virtual')

@section('content')
<div class="col-md-8 col-md-offset-2">
  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Champion League Goalscorer</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
  </head>
  <body>

  	<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Open Modal</button>
    <form method="post" action="{{url('api/usuario')}}" id="form">
        @csrf
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
      	
        <h5 class="modal-title">Uefa Champion League</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
                <form class="form-horizontal" role="form">
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
                
            </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
        </div>
    </div>
  </div>
</div>
  </form>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                  url: "{{ url('api/usuario') }}",
                  method: 'post',
                  data: {
                        _token: jQuery('input[name=_token]').val(),
                        name: jQuery('#name').val(''),
                        email: jQuery('#email').val(''),
                        password: jQuery('#password').val(''),
                        cep: jQuery('#cep').val(''),
                        endereco: jQuery('#endereco').val(''),
                        telefone: jQuery('#telefone').val(''),
                        tipousuario: jQuery('#tipousuario').val(''),
                        cidade: jQuery('#cidade').val(''),
                        estadoid: jQuery('#estadoid').val(''),
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


</body>
</html>


@endsection
