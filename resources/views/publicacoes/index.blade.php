<!doctype html>
<html lang="pt-br">
  <head>
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! config('adminlte.title') !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>

    </style>
  </head>
  <body>
  @include('componentes.navbar')

  @include('componentes.carrousel')

        <div class="container" align="center">
          <p class="lead text-muted"><br >O objetivo geral do Sistema de Gerenciamento de Publicações é fazer com que os usuários possam compartilhar de forma pública ou privada imagens, vídeos, documentos e músicas de forma acessível e segura.</p>
          <p>
            <a href="publicacoes/categorias" class="btn btn-primary my-2">Visualizar publicações</a>
          </p>
        </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../../../public/js/popper.min.js"></script>
    <script src="../../../public/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Dont actually copy the next line! -->
  </body>
</html>
