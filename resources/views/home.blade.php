@extends('adminlte::page')


<link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">

@section('content')

    <div class="row">
        @foreach ($publicacao->slice(0, 1) as $publicacoes)
            <div class="col-md-6">
                <div id="div4" class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5>Aviso!</h5>
                    Algumas publicações precisam ser validadas.
                </div>
            </div>
        @endforeach
    </div>

    <div class="box box-success collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Usuários</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="content">
                <div class="row">
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
                                            <td colspan="4">{{ __('Nenhuma registro encontrada') }}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="box box-success collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Publicaccoes</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="content">
                <div class="row">
                    @foreach ($publicacoesdia as $dia)
                    <div class="col-md-4 ">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $dia['title'] }}</span>
                                    <span class="info-box-number">{{ $dia['number'] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4 ">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total de Publicacoes</span>
                                <span class="info-box-number">{{ $publicacaoes }}</span>
                                <span class="info-box-text">Total de Publicacoes Pendentes</span>
                                <span class="info-box-number">{{ $publipendentes }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($publicacoesmes as $mes)
                            <div class="col-md-4 ">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ $mes['title'] }}</span>
                                        <span class="info-box-number">{{ $mes['number'] }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection
@section('scripts')


@endsection