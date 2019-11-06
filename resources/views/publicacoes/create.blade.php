@extends('adminlte::page')
    <head>
        <link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">

    </head>

@section('content')
    <body>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nova publicação</h3>
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)      {{ $error }} @endforeach
            @elseif(session()->has('success'))
                {{ session('success') }}
            @endif

            <div class="form">
                {!! Form::open(array('url' => 'api/publicacao','files'=>'true', 'enctype'=>'multipart/form-data' ,'multiple'=>true,)); !!}
                {!! csrf_field() !!}
                <div class="form-group" style="display:none;">
                    {!!Form::text('userid', Auth::user()->id , ['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    <strong>Nome:</strong>
                    {!!Form::text('nome', Auth::user()->nome , ['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    <strong>Titulo:</strong>
                    {!!Form::text('titulo', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    <strong id="cat">Categoria:</strong>
                    {!!Form::select('categoriaid', $list_categoria, null, ['class'=>'form-control',  'onclick' => 'selected(this.value)'])!!}
                </div>
                <div class="form-group">
                    <strong>Descrição</strong>
                    <textarea id="descricao" name="descricao" value="{{ old('descricao') }}" class="form-control" rows="3"
                              required></textarea>
                </div>
                <div class="selectcategoria" style="display:none;">
                    <div class="form-group">
                        {!! Form::label('capa', 'Capa Para Documento', ['class' => 'control-label']) !!}
                        <input id="capa" name="capa" type="file" class="file"
                               data-show-upload="false" data-show-caption="true" data-msg-placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('arquivo', 'Arquivo', ['class' => 'control-label']) !!}
                    <input id="arquivo" name="arquivo" type="file" class="file"
                           data-show-upload="false" data-show-caption="true" data-msg-placeholder="" required/>
                </div>

                @if (Auth::user()->tipousuario == 0  )
                    <div align="left">

                        <label>Situação:
                            <input type="radio" name="situacao" value="0"
                                   {{isset($publicacao->situacao) && $publicacao->situacao == 0 ? 'checked' : '' }}
                                   required>Pendente
                        </label>
                        <label>
                            <input type="radio" name="situacao" value="1"
                                   {{isset($publicacao->situacao) && $publicacao->situacao == 1 ? 'checked' : '' }}
                                   required>Publicar
                        </label>
                    </div>
                    <div class="posimg" align="left">
                        <label>Posição da Imagem:
                            <input type="radio" name="posicaoimagem" value="0"
                                   {{isset($publicacao->posicaoimagem) && $publicacao->posicaoimagem == 0 ? 'checked' : '' }}
                                   required>Vertical
                        </label>
                        <label>
                            <input type="radio" name="posicaoimagem" value="1"
                                   {{isset($publicacao->posicaoimagem) && $publicacao->posicaoimagem == 1 ? 'checked' : '' }}
                                   required>Horizontal
                        </label>

                    </div>
                @else
                @endif
                <div align="center">
                    <button type="submit" class="btn btn-primary" id='btn-salvar'> Salvar</button>
                    <a onClick="history.go(-1)" class="btn btn-primary" style="color: white">Cancelar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </body>
    <script type="text/javascript">
        function selected(value) {
            var selectcategoria = document.getElementsByClassName('selectcategoria');
            if (value == 1) {
                selectcategoria[0].style.display = 'block';
            } else {
                selectcategoria[0].style.display = 'none';
            }
        }
    </script>
@endsection


