<html>
<head>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>
<body>
@include('componentes.navbar')

<hr class="mt-4 mb-5">
    <section class="p-1">
        <div class="row">
            @foreach($publicacao as $key => $publicacoes)
                <div class="col-md-6">
                    <h4 class="pb-4">{{$publicacoes->titulo}}</h4>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{asset('uploads/' . $publicacoes->arquivo)}}" allowfullscreen></iframe>
                    </div>
                    <h3>{{$publicacoes->descricao}}</h3>
                </div>
            @endforeach
        </div>
    </section>


</body>
</html>