<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/customize.css') }}" rel="stylesheet">
<nav id="nav" class="navbar navbar-expand-md mb-4"  style="background-color:  #0d6aad;">

    {{--    verificar se o usuario logado é admin--}}
    @if (Auth::user()->tipousuario == 0  )
            <a  style="color: white" class="navbar-brand" href="/api/home">Painel</a>
        @else
            <a  style="color: white" class="navbar-brand" href="/api/publicacoes/controle">Painel</a>
    @endif

    <a href="#"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="right: 1196px; color: white" >
        {{ trans('adminlte::adminlte.log_out') }}
    </a>
    <form id="logout-form" action="{{ url(config('adminlte.logout_url', '/api/logout')) }}" method="POST" style="display: none;" >
        @if(config('adminlte.logout_method'))
            {{ method_field(config('adminlte.logout_method')) }}
        @endif
        {{ csrf_field() }}
    </form>
</nav>



