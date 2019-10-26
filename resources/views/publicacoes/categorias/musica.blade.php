<!doctype html>
<html lang="pt-br">
<head>

    <title>Sistema</title>
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

                    <audio id="player" controls onpause="alertaPausa()">
                        <source src="arquivo.ogg" type="audio/ogg">
                        <source src="{{asset('uploads/' . $publicacoes->arquivo)}}" type="audio/mp3">
                        Seu navegador não suporta áudio em HTML5, atualize-o.

                    </audio>

                    <div class="card-body">
                        <div id="itens">
                            <p>Titulo da Musica: {{$publicacoes->titulo}}</p>
                            <p>Descrição: {{$publicacoes->descricao}}</p>
                            <p>Enviado {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $publicacoes->created_at)->diffForHumans() }}
                                por {{$publicacoes->nome}}</p>


                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                               {{-- <a href="" id="whatsapp-share-btt" rel="nofollow" target="_blank">WhatsApp</a>   
                        <script type="text/javascript">
                            //Constrói a URL depois que o DOM estiver pronto
                            document.addEventListener("DOMContentLoaded", function() {
                                //conteúdo que será compartilhado: Título da página + URL
                                var conteudo = encodeURIComponent( "{{asset('uploads/' . $publicacoes->arquivo)}}" );
                                //altera a URL do botão
                                document.getElementById("whatsapp-share-btt").href = "https://api.whatsapp.com/send?text=" + conteudo;
                            }, false);
                        </script>--}}
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
