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
          <h1 class="jumbotron-heading">Sobre a Galeria</h1>
          <p class="lead text-muted">Apresentação</p>
          <p>
            <a href="publicacoes/categorias" class="btn btn-primary my-2">Visualizar Obras</a>
          </p>
        </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src=".js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Dont actually copy the next line! -->
    <script src="js/holder.min.js"></script>
  </body>
</html>
