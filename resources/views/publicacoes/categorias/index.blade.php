<!doctype html>
<html lang="pt-br">

<head>
    <title>{!! config('adminlte.title') !!}</title>

    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    @include('componentes.navbar')
</head>
<body>
<div class="container marketing"   >
    <div class="row" align="center">
        <div class="col-lg-4" style="" >
            <a href=" /api/publicacoes/imagens"> <img id="imagem" class="img-thumbnail" src="https://www.freeiconspng.com/uploads/multimedia-photo-icon-31.png" alt=""
                                                      style="width: 243px;"></a>
            <h2 >Imagens </h2>
        </div>

        <div class="col-lg-4" >
            <a href="/api/publicacoes/videos"> <img style="width: 243px;" class="img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWpoazknINXMBUcEJa1RyEl-7jD4F9HaNhRKvIyBDkK36zDdlH&s" alt="" ></a>
            <h2>Videos </h2>
        </div>

        <div class="col-lg-4">
            <a href="/api/publicacoes/documentos">  <img style="width: 243px;" class="img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScYLd1wewsCZOpEXuHpCfiFIrqpCaiWZKJqc8lrnyQnWyC-pR8Ag&s" alt="" ></a>
                <h2 >Documentos </h2>
        </div>

        <div class="col-lg-4">
            <a href="/api/publicacoes/musicas">  <img style="width: 243px;" class="img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTK-_z300vtF3GciFMTsWWZpvYJc9bGPy3xFuGecofeKqjBDZf&s" alt="" ></a>
                <h2 >Musicas </h2>
        </div>
    </div>
</div>
</body>
</html>



