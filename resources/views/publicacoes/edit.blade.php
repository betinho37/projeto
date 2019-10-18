@extends('adminlte::page')
@section('title', 'Museu Virtual')

<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">
<style rel="stylesheet" type="text/css">
    .row { display: table; }
    .thumbnail { float: left; width: 60%; }
    .conteudo {  float: left; width: 60%; }
</style>
@section('content')

    <div id="div3">

        <h4 align="Center">Publicação </h4>

        {!!Form::open(['route'=>['publicacao.update', $publicacao->id ],'file'=>true, 'enctype'=>'multipart/form-data', 'method'=>'put'])!!}
        @if (Auth::user()->tipousuario == 0  )

            <div class="form-group">
                <strong>Nome:</strong>
                {!!Form::text('nome', $publicacao->nome, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                <strong>Titulo da Imagem:</strong>
                {!!Form::text('titulo', $publicacao->titulo, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                <strong>Categoria:</strong>
                {!!Form::select('categoriaid', $list_categoria, $publicacao->categoriaid, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                <strong>Descrição:</strong>
                {!!Form::textarea('descricao', $publicacao->descricao, ['class'=>'form-control'])!!}
            </div>

            @if($publicacao->arquivo != null )
                <div class="form-group row">
                    <div class="col-md-5">
                        @if($publicacao->categoriaid == 1 )
                            <div class="row">
                            <div class="thumbnail">
                                    <div class="caption">
                                        <img src="{{asset('uploads/' . $publicacao->capa)}}"  alt="{{'uploads/' . $publicacao->arquivo}}"
                                             class="img-responsive"/></a>
                                    </div>
                            </div>
                                <div class="conteudo">
                            <iframe src="{{asset((isset($publicacao) && $publicacao->arquivo!='')?'uploads/'.$publicacao->arquivo:'')}}"
                                    width="300px" height="300px">
                            </iframe>
                                </div>
                            </div>
                        @elseif( $publicacao->categoriaid == 2 )
                            <img id="grande"
                                 src="{{asset((isset($publicacao) && $publicacao->arquivo!='')?'uploads/'.$publicacao->arquivo:'')}}"
                                 style="width: 556px; height: 300px;" alt="foto indisponível" title="legenda">
                        @elseif( $publicacao->categoriaid == 3 )
                            <h1>musica</h1>
                        @else
                            <video src="{{asset((isset($publicacao) && $publicacao->arquivo!='')?'uploads/'.$publicacao->arquivo:'')}}"
                                   height="278px" width="381px" controls>
                            </video>
                        @endif
                    </div>
                </div><br/>
            @else
            @endif

            @if ($publicacao->categoriaid == 1)

                <div>
                    <strong>Capa</strong>
                    <input id="capa" name="capa" type="file" class="file" multiple
                           data-show-upload="false" data-show-caption="true"
                           data-msg-placeholder="Select {files} for upload...">
                </div>
            @endif
            <div>
                <strong>Arquivo</strong>
                <input id="arquivo" name="arquivo" type="file" class="file" multiple
                       data-show-upload="false" data-show-caption="true"
                       data-msg-placeholder="Select {files} for upload...">
            </div>

            <div align="left"><p></p>
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
            <div align="left"><p></p>
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
            <div align="Center" class="form-group">
                {!!Form::submit('Salvar', ['class="btn btn-primary"'])!!}
                <td><a href="{{@url('api/publicacao').'/destroy/'.$publicacao->id}}" class="btn btn-danger"
                       onclick="return confirm('Tem certeza de que deseja excluir este usuario ?');">
                        <span class="glyphicon glyphicon-trash"></span>Excluir</a></td>
                <a href="/api/publicacoes/controle" class="btn btn-primary">Voltar</a>
            </div>
    </div>
    @else
        <div class="form-group">
            <strong>Nome:</strong>
            {!!($publicacao->nome)!!}
        </div>
        <div class="form-group">
            <strong>Titulo da Imagem:</strong>
            {!!($publicacao->titulo)!!}
        </div>
        <div class="form-group">
            <strong>Descrição:</strong>
            {!!( $publicacao->descricao)!!}
        </div>
        @if($publicacao->arquivo != null )
            <div class="form-group row">
                <div class="col-md-5">
                    <a href="{{asset('uploads/' . $publicacao->arquivo)}}">
                        <img id="preview"
                             src="{{asset((isset($publicacao) && $publicacao->arquivo!='')?'uploads/'.$publicacao->arquivo:'')}}"
                             height="200px" width="200px"/>
                    </a>
                </div>
            </div><br/>
        @else
        @endif


        <div align="Center" class="form-group">
            <a href="/publicacoes/controle" class="btn btn-primary">Voltar</a>
        </div>
    @endif
    {!! Form::close() !!}

@endsection
