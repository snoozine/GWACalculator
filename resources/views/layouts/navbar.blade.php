<nav class="navbar navbar-expand-md">
    <div class="navbar2 d-flex  ">
        <div class="navbar-container">
            <a class="sub-div">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img class="navbrand" src="{{url('/image/breakitlogo.png')}}" alt="">
                </a>
            </a>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="text-white navbar-toggler-icon"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">

            </ul>
            <ul class="navbar-nav ms-auto">

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        style="font-size: 17px" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        v-pre>
                        Hi, <b style="font-weight: 600">{{ Auth::user()->name }}!</b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="/" class="dropdown-item ">Home</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="yellow-line">

</div>