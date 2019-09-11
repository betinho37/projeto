<!doctype html>
<html lang="pt-br">
<head>
    <meta name="author" content="">
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
</head>
<body>
@include('componentes.navbar')
<div class="card-body">
    <div>
        <div class="mb-2">
            <div class="float-right">
                <div class="btn-group">
                    <a class="btn btn-default" href="javascript:void(0)" data-sortasc=""> Crescente </a>
                    <a class="btn btn-default" href="javascript:void(0)" data-sortdesc=""> Decrescente </a>
                </div>
                <div class="float-right">
                    <select class="custom-select" style="width: auto;" data-sortorder="">
                        <option value="index">Classificar por data</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-container p-0 row " style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 331px;">
        @foreach($publicacao as $key => $publicacoes)
            <div>
                <div class="filtr-item col-sm-2" data-category="1"  style="opacity: 1; transform: scale(1) translate3d(684px, 164px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 168.4px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                    <a href="{{asset('uploads/' . $publicacoes->arquivo)}}" data-toggle="lightbox" data-title="{{$publicacoes->titulo}}" >
                        <img src="{{asset('uploads/' . $publicacoes->arquivo)}}"  {{--alt="{{'uploads/' . $publicacoes->arquivo}}"--}} class="img-fluid mb-2" alt="white sample">
                    </a>
                    <p>{{$publicacoes->descricao}}</p>
                </div>
            </div>
        @endforeach

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