@extends('adminlte::page')

<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">




@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nova publicação</h3>
        </div>


        <div class="form"  >

            {!! Form::open(array('url' => 'api/publicacao','files'=>'true', 'enctype'=>'multipart/form-data' ,'multiple'=>true,)); !!}

            {!! csrf_field() !!}

            <div class="form-group" style="display:none;">
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



            <div class="form-group">
                <strong id="cat">Categoria:</strong>
                {!!Form::select('categoriaid', $list_categoria, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group" >
                <strong>Descrição</strong><p></p>
                <textarea id="descricao" name="descricao" value="{{ old('descricao') }}" class="form-control" rows="3" required></textarea>
            </div>

            <div>
                {!! Form::label('arquivo', 'Arquivo', ['class' => 'control-label']) !!}
                <input id="arquivo" name="arquivo" type="file" class="file"
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="" required>
                <br />
            </div><br />



            @if (Auth::user()->tipousuario == 0  )

                <div align="left" ><p></p>

                    <label>Situação:
                        <input type="radio" name="situacao" value="0"
                               {{isset($publicacao->situacao) && $publicacao->situacao == 0 ? 'checked' : '' }}
                               required>Pendente
                    </label>
                    <label>
                        <input type="radio" name="situacao" value="1"
                               {{isset($publicacao->situacao) && $publicacao->situacao == 1 ? 'checked' : '' }}
                               required>Publicar
                    </label><br>
                </div><p></p>

                <div align="left" ><p></p>

                    <label>Posição da Imagem:
                        <input type="radio" name="posicaoimagem" value="0"
                               {{isset($publicacao->posicaoimagem) && $publicacao->posicaoimagem == 0 ? 'checked' : '' }}
                               required>Vertical
                    </label>

                    <label>
                        <input type="radio" name="posicaoimagem" value="1"
                               {{isset($publicacao->posicaoimagem) && $publicacao->posicaoimagem == 1 ? 'checked' : '' }}
                               required>Horizontal
                    </label><br>

                </div><p></p>
            @else
            @endif

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
