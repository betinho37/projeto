<!doctype html>
<html lang="pt-br">
<head>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @include('componentes.navbar')
</head>
<body>
<div class="container marketing" style="padding:30px">
    <div class="row">
        @foreach($publicacao as $publicacoes)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <a  href="{{asset('uploads/' . $publicacoes->arquivo)}}"   data-toggle="modal" data-target="#modalExemplo">
                            <img src="{{asset('uploads/' . $publicacoes->capa)}}"  alt="{{'uploads/' . $publicacoes->arquivo}}"
                                 class="img-responsive"/></a>
                    </div>
                </div>
                <div class="text-item" >
                    <p>Titulo: {{$publicacoes->titulo}}</p>

                </div>
            </div>

        @endforeach
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Titulo: {{$publicacoes->titulo}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    <img src="{{asset('uploads/' . $publicacoes->capa)}}"  alt="{{'uploads/' . $publicacoes->arquivo}}"
                         class="img-responsive"/></a>
                </div>
                <div class="text-item">
                    <p>Descrição: {{$publicacoes->descricao}}</p>
                    <p>Enviado por: {{$publicacoes->nome}}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{asset('uploads/' . $publicacoes->arquivo)}}" download="{{asset('uploads/' . $publicacoes->arquivo)}}" class="btn btn-primary" role="button">Download</a>
                </div>
            </div>
        </div>
    </div>
    {{ $publicacao->links() }}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</div>
</body>

</html>