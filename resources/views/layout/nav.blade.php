<div class=" navbar navbar-default margin-0">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="row">
                <div class="col-md-1"><a class="navbar-brand-app" style="font-size: 22px;" href="{{ url('/') }}">
                        {{ config('app.name', 'hostNdine') }}
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-5 beta">Beta</div>
            </div>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())


                    <li class="become-box"><a href="{{ url('/register?account=chef') }}">Be a Chef</a></li>
                    <li class="">&nbsp;&nbsp;&nbsp;</li>
                    <li class="become-box"><a href="{{ url('/register?account=host') }}">Become a Host</a></li>
                    <li class="">&nbsp;&nbsp;&nbsp;</li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                @else

                    <li class="dropdown">
                        <a href="{{ url('/home') }}" class="dropdown-toggle" id="dropdownMenu"
                           data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ ucfirst(Auth::user()->firstname) }}&nbsp;{{ ucfirst(Auth::user()->lastname) }} <span
                                    class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu" role="menu">
                            <li class="dropdown-item">
                                <a href="{{ url('/dashboard') }}">My Account</a>
                            </li>
                            @if(Auth::user()->profile->host == null)
                                <li><a href="{{ route('host.fill.info') }}">Become a Host</a></li>
                            @endif
                            @if(Auth::user()->profile->chef == null)
                                <li><a href="{{ route('chef.fill.info')  }}">Become a Chef</a></li>
                            @endif
                            <li><a href="{{ url('/') }}">Submit a Menu Idea</a></li>
                            <li><a href="{{ url('/') }}">Book a Seat</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>

        </div>

    </div> <!-- end container -->
</div> <!-- end top-navbar -->
