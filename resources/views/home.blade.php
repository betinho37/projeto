@extends('adminlte::page')
@section('content')
    <div class="content">
        <div class="row">
                <h2>Usuarios</h2>
                
            @foreach ($blocosnumericos as $numericos)
            <div class="col-md-4 ">
                    <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                
                            <div class="info-box-content">
                                    <span class="info-box-text">{{ $numericos['title'] }}</span>
                                    <span class="info-box-number">{{ $numericos['number'] }}</span>
                            </div>
                            <!-- /.info-box-content -->
                     </div>
            </div>
            @endforeach
                    <div class="col-md-4 ">
                            <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content">
                                            <span class="info-box-text">Total de Usuarios</span>
                                            <span class="info-box-number">{{ $users }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                             </div>
                    </div>
        </div>
        </div>
        <div class="row">
            @foreach ($blocoslista as $lista)
                <div class="col-md-6">
                    <h3>{{ $lista['title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Último login em</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($lista['registro'] as $registro)
                            <tr>
                                <td>{{ $registro->nome }}</td>
                                <td>{{ $registro->email }}</td>
                                <td>{{ $registro->last_login_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('Nenhuma registro encontrada') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
        
@endsection
@section('scripts')

   
@endsection