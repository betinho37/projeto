@extends('adminlte::page')




@section('title', 'Museu Virtual')

@section('content')

    <style type="text/css">
        select.form-control:not([size]):not([multiple]) { height:calc(2.25rem + 9px); }
    </style>
    <div style="padding:30px">

        <h4 align="Center" >Publicação </h4>

        {!!Form::open(['route'=>['publicacao.update', $publicacao->id ],'file'=>true, 'enctype'=>'multipart/form-data', 'method'=>'put'])!!}
        @if (Auth::user()->tipousuario == 0  )

            <div class="form-group" >
                <strong>Nome:</strong>
                {!!Form::text('nome', $publicacao->nome, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group" >
                <strong>Titulo da Imagem:</strong>
                {!!Form::text('titulo', $publicacao->titulo, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group" >
                <strong>Categoria:</strong>
                {!!Form::select('categoriaid', $list_categoria, $publicacao->categoriaid, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group" >
                <strong>Descrição:</strong>
                {!!Form::text('descricao', $publicacao->descricao, ['class'=>'form-control'])!!}
            </div>

            @if($publicacao->arquivo != null )
                <div class="form-group row">
                    <div class="col-md-5">
                        <a href="{{asset('uploads/' . $publicacao->arquivo)}}"  >
                            <img id="preview"
                                 src="{{asset((isset($publicacao) && $publicacao->arquivo!='')?'uploads/'.$publicacao->arquivo:'')}}"
                                 height="200px" width="200px"/>
                        </a>
                    </div>
                </div><br/>
            @else
            @endif
            @if($publicacao->arquivo != null )
                <div>
                    <label ><font color="black">Imagem: {{$publicacao->arquivo}}</label></font>
                    <a href="{{ route('excluir.arquivo',$publicacao->arquivo) }}" class="btn btn-primary btn-xs">Excluir Arquivo</a>
                </div><p></p>
            @else
            @endif
            <strong>Alterar Imagem:</strong><p></p>
            <div>
                <input id="arquivo" name="arquivo" type="file" class="file" multiple
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
            </div>
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

            <div align="Center" class="form-group" >
                {!!Form::submit('Salvar', ['class="btn btn-primary"'])!!}
                <td><a  href="{{@url('api/publicacao/').'/'.$publicacao->id.''}}" class="btn btn-danger"   onclick="return confirm('Tem certeza de que deseja excluir este item ?');" >Excluir</a></td>
                <a href="/publicacoes/controle" class="btn btn-primary">Voltar</a>
            </div>
    </div>



    @else
        <div class="form-group" >
            <strong>Nome:</strong>
            {!!($publicacao->nome)!!}
        </div>

        <div class="form-group" >
            <strong>Titulo da Imagem:</strong>
            {!!($publicacao->titulo)!!}
        </div>
        <div class="form-group" >
            <strong>Descrição:</strong>
            {!!( $publicacao->descricao)!!}
        </div>

        @if($publicacao->arquivo != null )
            <div class="form-group row">
                <div class="col-md-5">
                    <a href="{{asset('uploads/' . $publicacao->arquivo)}}"  ><img id="preview"
                                                                                  src="{{asset((isset($publicacao) && $publicacao->arquivo!='')?'uploads/'.$publicacao->arquivo:'')}}"
                                                                                  height="200px" width="200px"/>
                    </a>
                </div>
            </div><br/>
        @else
        @endif
        <script type="text/javascript">

            function PreviewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("arquivo").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                };
            };

        </script>

        </div>

        <div align="Center" class="form-group" >
            <a href="/publicacoes/controle" class="btn btn-primary">Voltar</a>
        </div>
        </div>
    @endif
    {!! Form::close() !!}

@endsection
