<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/customize.css') }}" rel="stylesheet">

{{--
<nav class="navbar navbar-expand-md navbar navbar navbar-light "   style="background-color: #337ab7;">
        <a style="color: white" class="navbar-brand" href="/api/home">Portal</a>
          @if (Auth::guest())
            <ul class="navbar-nav mr-auto" >
                @else
                    <div class="navbar-custom-menu" >

                        <ul class="nav navbar-nav" >
                            <li>
                                @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                    <a href="{{ url(config('adminlte.logout_url', '/api/logout')) }}">
                                    </a>
                                @else
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
                                @endif
                            </li>
                        </ul>
                    </div>
                <form id="logout-form" action="{{ url('/api/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
          @endif
</nav>
--}}
<nav id="nav" class="navbar navbar-expand-md mb-4"  style="background-color:  #0d6aad;">
    <a  style="color: white" class="navbar-brand" href="/api/home">Portal</a>
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



