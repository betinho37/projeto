@extends('adminlte::page')

@section('title', 'Museu Virtual')

@section('content_header')

    <div class="div1" style="padding:30px">
                <a href="/usuario/create" class="btn btn-primary" >Novo Usuário</a>
            <table align="center" class="table"><p></p>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Opcões</th>
                @foreach($usuario as $usuario)
                    <tr>
                        
                        <td>{{$usuario -> name }}</td>
                        <td>{{$usuario -> email }}</td>
                        <td><a href="{{@url('usuario').'/' . $usuario->id .'/'. 'edit' }}" class="btn btn-primary">Editar</a>
                            <a  href="{{@url('/api/usuario').'/destroy/'.$usuario->id.''}}" class="btn btn-danger"  onclick="return confirm('Tem certeza de que deseja excluir este item ?');" >Excluir</a></td>
                    </tr>
            @endforeach
        </table>
    </div>
@stop

@section('content')
@stop