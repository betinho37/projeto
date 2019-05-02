
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="navbar-top.css" rel="stylesheet">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/publicacao">Home</a>
          @if (Auth::guest())
            <ul class="navbar-nav mr-auto" >
                <li  class="nav-item active" >
                  <a  class="nav-link" href="/login">Login <span  class="sr-only">(current)</span></a>
                </li>
                @else
                     <a  style="color: white" class="nav-link disabled" href="/home">{{ Auth::user()->name }}</a>
                        <a style="color: white" class="nav-link disabled" href="{{ url('/logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair
                      </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          @endif

      </nav>
