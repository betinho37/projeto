<html>
<head>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="https://unpkg.com/nanogallery2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>

</head>
<body>
@include('componentes.navbar')

<div ID="ngy2p" data-nanogallery2='{
        "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/",
        "thumbnailWidth": "400",
         "thumbnailHeight": "200",
        "thumbnailAlignment": "center"
      }'>

    @foreach($publicacao as $key => $publicacoes)
    <a href="{{asset('uploads/' . $publicacoes->arquivo)}}" data-ngthumb="" alt="{{'uploads/' . $publicacoes->arquivo}}" data-ngdesc="Video">{{$publicacoes->titulo}}</a>
    @endforeach


</div>

</body>
</html>