<!doctype html>
<html lang="pt-br">
<head>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    @include('componentes.navbar')
</head>
<body>
<div class="container marketing"   >
    <div class="row" >
        <div class="col-lg-4">
            <a href=" /api/publicacoes/imagens"> <img  class="img-thumbnail" src="http://www.montatudo.com/i/montatudo/9931161998_266231.jpg" alt="http://www.montatudo.com/i/montatudo/9931161998_266231.jpg" ></a>
            <h2 >Imagens </h2>
        </div>

        <div class="col-lg-4">
            <a href="/api/publicacoes/videos"> <img  class="img-thumbnail" src="http://www.montatudo.com/i/montatudo/9931161998_266231.jpg" alt="" ></a>
            <h2>Videos </h2>
        </div>

        <div class="col-lg-4">
            <a href="/api/publicacoes/documentos">  <img class="img-thumbnail" src="http://www.montatudo.com/i/montatudo/9931161998_266231.jpg" alt="" ><a/>
                <h2 >Documentos </h2>
        </div>

        <div class="col-lg-4">
            <a href="/api/publicacoes/musicas">  <img class="img-thumbnail" src="http://www.montatudo.com/i/montatudo/9931161998_266231.jpg" alt="" ><a/>
                <h2 >Musicas </h2>
        </div>
    </div>
</div>
</body>
</html>



