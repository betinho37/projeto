@extends('adminlte::page')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nova publicação</h3>
        </div>


        <div style="padding:25px" >

            {!! Form::open(array('url' => 'api/publicacao','files'=>'true', 'enctype'=>'multipart/form-data' ,'multiple'=>true,)); !!}

            {!! csrf_field() !!}

            <div  class="form-group" style="display:none;">
                {!!Form::text('userid', Auth::user()->id , ['class'=>'form-control'])!!}
            </div>

            <div class="form-group"><p></p>
                <strong>Nome:</strong><p></p>
                {!!Form::text('nome', Auth::user()->nome , ['class'=>'form-control'])!!}
            </div>

            <div class="form-group"><p></p>
                <strong>Titulo:</strong><p></p>
                {!!Form::text('titulo', null, ['class'=>'form-control'])!!}
            </div>
                @if (Auth::user()->tipousuario == 0  )
                        <div class="form-group">
                            <strong id="cat">Categoria:</strong>
                            {!!Form::select('categoriaid', $list_categoria, null, ['class'=>'form-control'])!!}
                        </div>
                    @else
                @endif
            <div class="form-group" >
                <strong>Descrição</strong><p></p>
                <textarea id="descricao" name="descricao" value="{{ old('descricao') }}" class="form-control" rows="3"></textarea>
            </div>

            <div>
                {!! Form::label('imagem', 'Imagem', ['class' => 'control-label']) !!}
                <input id="arquivo" name="arquivo" type="file" class="file" multiple
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                <br />
            </div><br />

            <div align="center">
                <button type="submit" class="btn btn-primary" id='btn-salvar'> Salvar </button>
                <a href="controle" class="btn btn-primary">Cancelar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#btn-salvar").click( function(event) {
                    var salvar = confirm('Sua publicação será avaliada e em breve estará disponível na Galeria');
                    if (salvar){
                    }else{
                        event.preventDefault();
                    }
                });
            });
        </script>
    </div>
@endsection
