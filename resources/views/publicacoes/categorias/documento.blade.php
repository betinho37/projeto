<!doctype html>
<html lang="pt-br">
<head>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @include('componentes.navbar')
</head>

<body><br>
<div id="botao">
    <a onClick="history.go(-1)" class="btn btn-primary" style="color: white">Voltar</a>
</div>
<div class="container marketing" style="padding:30px">
    <div id="ro" class="row">
        @foreach($publicacao as $publicacoes)
            @if($publicacoes->situacao == 1  )
                <div class="col-sm-6 col-md-4">
                    <div id="thumb" class="thumbnail">
                        <div id="capt" class="caption">
                            <a data-toggle="modal" data-target="#modal-default">
                                <img style='height: 100%; width: 100%; object-fit: contain' src="{{asset('uploads/' . $publicacoes->capa)}}"
                                     alt="{{'uploads/' . $publicacoes->arquivo}}" class="img-responsive"/></a>
                        </div>
                    </div>
                </div>
            @else
            @endif
        @endforeach
    </div>
    @foreach ($publicacao as $publicacoes)
        <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img style="width: 190px" src="{{asset('uploads/' . $publicacoes->capa)}}"
                             alt="{{'uploads/' . $publicacoes->arquivo}}"
                             class="img-responsive"/></a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Titulo: {{$publicacoes->titulo}}</p>
                        <p>Descrição: {{$publicacoes->descricao}}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="{{asset('uploads/' . $publicacoes->arquivo)}}"
                           download="{{asset('uploads/' . $publicacoes->arquivo)}}" class="btn btn-primary" role="button">Download</a>
                        @if (Auth::user()->tipousuario == 0  )
                            <a  href="{{@url('api/publicacao').'/' . $publicacoes->id .'/'. 'edit' }}" class="btn btn-success">Editar</a>
                        @endif
                        <a href="{{asset('uploads/' . $publicacoes->arquivo)}}" class="btn btn-primary" role="button">Visualizar arquivo</a>
                    </div>
                </div>
            </div>
        </div>
</div>

@endforeach

{{ $publicacao->links() }}
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


</html>