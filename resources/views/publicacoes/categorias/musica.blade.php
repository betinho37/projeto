<!doctype html>
<html lang="pt-br">
<head>

    <title>Sistema</title>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    @include('componentes.navbar')

</head>
<body>
    <script>
        function pega_tempo() {
            alert("Duração da faixa: " + document.getElementById("demo").duration);
        }

        function alertaPausa() {
            alert("Olá!nPor que pausou? Clique Play pra tocar o resto!");
        }
    </script>
        <audio id="demo" controls onpause="alertaPausa()">
            @foreach($publicacao as $publicacoes)
                <source src="arquivo.ogg" type="audio/ogg">
                <source src="{{asset('uploads/' . $publicacoes->arquivo)}}" type="audio/mpeg">
                Seu navegador não suporta áudio em HTML5, atualize-o.
            @endforeach
        </audio>
    <button onclick="document.getElementById('demo').play()">►</button>
    <button onclick="document.getElementById('demo').pause()">||</button>
    <button onclick="document.getElementById('demo').volume+=0.1">▲</button>
    <button onclick="document.getElementById('demo').volume-=0.1">▼</button>
    <button onmousedown="document.getElementById('demo').currentTime+=2">»</button>
    <button onmousedown="document.getElementById('demo').currentTime-=2">«</button>
    <button onclick="pega_tempo()" type="button">CLIQUE-ME</button>

    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>



</body>
</html>


{{--
--}}
