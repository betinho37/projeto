<html lang="pt-br">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Galeria</title>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {

      margin: auto;
  }
  </style>
</head>
<body>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


                    <!-- CARROUSSEL IMAGENS -->

                <div class="carousel-inner" role="listbox">
                    @foreach( $publicacao as $publicacoes )
                        @if($publicacoes->posicaoimagem == 0)
                              <div class="item {{ $loop->first ? ' active' : '' }}" >
                                <a href="{{asset('uploads/' . $publicacoes->arquivo)}}">  <img src="{{asset('uploads/' . $publicacoes->arquivo)}}" alt="{{asset('uploads/' . $publicacoes->arquivo)}}"  width="300" height="225"> </a>
                              </div>
                            @else
                              <div class="item {{ $loop->first ? 'active ' : '' }}" >
                                  <a href="{{asset('uploads/' . $publicacoes->arquivo)}}">   <img src="{{asset('uploads/' . $publicacoes->arquivo)}}" alt="{{asset('uploads/' . $publicacoes->arquivo)}}"  width="852" height="1136"></a>
                              </div>
                          @endif


                    @endforeach
                </div>


                  <!-- CARROUSSEL CONTROLES -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
</div>
</body>
</html>
