<!doctype html>
<html lang="pt-br">
<head>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    @include('componentes.navbar')
</head>

<body>

<div class="container marketing" style="padding:30px">

    <div class="row">
        @foreach($publicacao as $publicacoes)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <a  href="{{asset('uploads/' . $publicacoes->arquivo)}}">
                                <img src="{{asset('uploads/' . $publicacoes->capa)}}"  alt="{{'uploads/' . $publicacoes->arquivo}}"
                                     class="img-responsive"/></a>
                        </div>
                    </div>
                    <div class="text-item" >
                        <p>Titulo: {{$publicacoes->titulo}}</p>
                        <p>Descrição: {{$publicacoes->descricao}}</p>
                        <p>
                            <a href="{{asset('uploads/' . $publicacoes->pdf)}}" download="{{asset('uploads/' . $publicacoes->pdf)}}" class="btn btn-primary" role="button">Download</a>
                    </div>
                </div>

        @endforeach
    </div>

{{ $publicacao->links() }}
</body>

</html>