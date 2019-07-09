<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Galeria</title>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
     <style>

  .navbar  {
    padding: 5px;
    margin-top: 0px;
  }

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
