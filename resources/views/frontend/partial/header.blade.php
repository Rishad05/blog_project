<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href="#">
            TRAVELICIOUS
        </a>
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item">
                    @auth()
                        <a class="nav-link" href={{ route('authorDashboard') }}>Write Blog </a>
                    @else
                        <a class="nav-link" href={{ route('authorLogin') }}>Write Blog </a>
                    @endauth
                </li>
                <li class="nav-item">
                    @auth()
                        <span data-feather="user"></span>
                        <span>{{ auth()->user()->name }} </span>
                        <a style="color:white; margin-left: 50px;" class="btn btn-danger"
                            href="{{ route('userLogout') }}"> Logout</a>
                    @else
                        <a class="nav-link" href={{ route('authorLogin') }}>Sign in</a>
                    @endauth
                </li>
            </ul>
            <!-- End Menu -->
        </div>
    </div>
</nav>
<!-- End Nav
