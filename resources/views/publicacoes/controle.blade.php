@extends('adminlte::page')

@section('title', 'Museu Virtual')

@section('content_header')
    <h1 align="center" >Publicações</h1>
    <div class="div1" style="padding:30px">
      <a class="btn btn-primary" href="/publicacao/create">Nova Publicação</a>
      <table align="center" class="table"><p></p>
        <tr>
            <th>Nome</th>
            <th>Titulo da Imagem</th>
            <th>Data</th>
            <th>Situação</th>
            <th>Opcões</th>
      </tr>
        @foreach($publicacao as $publicacoes)
      <tr>
          <td>{{$publicacoes -> nome }}</td>
          <td>{{$publicacoes -> titulo }}</td>
          <td>{{  date( 'd/m/Y' , strtotime($publicacoes->created_at  ))}}</td>
          <td>{{isset($publicacoes->situacao) && $publicacoes->situacao == 0 ? 'Pendente' : 'Publicado' }}</td>
          <td><a href="{{@url('publicacao').'/edit/'.$publicacoes->id.''}}" class="btn btn-primary">Visualizar</a></td>
    </tr>
    @endforeach
  </table>
  {{ $publicacao->links() }}
</div>









@stop

@section('content')
@stop