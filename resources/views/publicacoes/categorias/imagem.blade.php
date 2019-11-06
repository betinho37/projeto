<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
@include('componentes.navbar')<br>
<div id="botao" >
    <a onClick="history.go(-1)" class="btn btn-primary" style="color: white">Voltar</a>
</div>
<div class="card-body">
    <div class="col-12" >
        <div class="row" align="center">
            @foreach($publicacao as $key => $publicacoes)
                <div class="col-sm-2"align="center">
                    <a href="{{asset('uploads/' . $publicacoes->arquivo)}}" data-toggle="lightbox" data-title="{{$publicacoes->titulo}}" data-gallery="gallery">
                        <img src="{{asset('uploads/' . $publicacoes->arquivo)}}" class="img-fluid mb-2" alt="white sample">
                    </a><p style="width: auto;" >{{$publicacoes->descricao}}</p>
                    @if (Auth::user()->tipousuario == 0  )
                        <a  href="{{@url('api/publicacao').'/' . $publicacoes->id .'/'. 'edit' }}" class="btn btn-success">Editar</a>
                    @endif
                </div>

            @endforeach

        </div>

    </div>

</div>

{{ $publicacao->links() }}
</body>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/filterizr/2.2.3/jquery.filterizr.min.js"></script>

<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>

</html>