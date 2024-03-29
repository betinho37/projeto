<!doctype html>
<html lang="pt-br">
<head>

    <title>{!! config('adminlte.title') !!}</title>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    @include('componentes.navbar')

</head>
<body><br>
<div id="botao" >
    <a onClick="history.go(-1)" class="btn btn-primary" style="color: white">Voltar</a>
</div>
<div class="container marketing" style="padding:20px">

    <div class="row">
        @foreach($publicacao as $publicacoes)



            <div id="cold" class="col-md-4">
                <div id="card" class="card mb-4 shadow-sm">
                    <audio id="player" controls onpause="alertaPausa()" >
                        <source src="{{asset('uploads/' . $publicacoes->arquivo)}}" type="audio/mp3">
                        Seu navegador não suporta áudio em HTML5, atualize-o.

                    </audio>

                    <div class="card-body">
                        <div id="itens">
                            <p>Titulo da Musica: {{$publicacoes->titulo}}</p>
                            <p>Descrição: {{$publicacoes->descricao}}</p>
                            <p>Enviado {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $publicacoes->created_at)->diffForHumans() }}
                                por {{$publicacoes->nome}}</p>

                            @if (Auth::user()->tipousuario == 0  )
                                <a  href="{{@url('api/publicacao').'/' . $publicacoes->id .'/'. 'edit' }}" class="btn btn-success">Editar</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{ $publicacao->links() }}

</body>
</html>
