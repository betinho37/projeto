@extends('adminlte::page')
<head>
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet" type="text/css">
    <title>{!! config('adminlte.title') !!}</title>
</head>
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
                                <span class="info-box-text">Total de Usuários</span>
                                <span class="info-box-number">{{ $users }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($blocoslista as $lista)
                            <h4 align="center"> {{ $lista['title'] }}</h4>
                            <div class="table-responsive">

                                <table class="table table-dark text-center">
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
                                            <td>{{ date( 'd/m/Y ' , strtotime($registro->last_login_at ))}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">{{ __('Nenhum registro encontrado') }}</td>
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
            <h3 class="box-title">Publicações</h3>
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
                                    <span class="info-box-text">Total de Publicacoes Pendentes</span>
                                    <span class="info-box-number">{{ $publipendentes }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4 ">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                            <div class="info-box-content">

                                <span class="info-box-text">Total de Publicações</span>
                                <span class="info-box-number">{{ $publicacaoes }}</span>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')


@endsection
