<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="navbar-top.css" rel="stylesheet">

<nav class="navbar navbar-expand-md navbar navbar navbar-light "   style="background-color: #337ab7;">
        <a style="color: white" class="navbar-brand" href="/api/home">Portal</a>
          @if (Auth::guest())
            <ul class="navbar-nav mr-auto" >
                @else
                    <div class="navbar-custom-menu" >

                        <ul class="nav navbar-nav">
                            <li>
                                @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                    <a href="{{ url(config('adminlte.logout_url', '/api/logout')) }}">
                                    </a>
                                @else
                                    <a href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="left: 1196px; color: white" >
                                        <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                    </a>
                                    <form id="logout-form" action="{{ url(config('adminlte.logout_url', '/api/logout')) }}" method="POST" style="display: none;">
                                        @if(config('adminlte.logout_method'))
                                            {{ method_field(config('adminlte.logout_method')) }}
                                        @endif
                                        {{ csrf_field() }}
                                    </form>
                                @endif
                            </li>
                        </ul>
                    </div>
                <form id="logout-form" action="{{ url('/api/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          @endif
</nav>




