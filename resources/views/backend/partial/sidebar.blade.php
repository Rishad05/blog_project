<nav id="sidebarMenu" style="Background-color: #212529"
    class="col-md-3 col-lg-2 d-md-block sidebar collapse background ">
    <div class="position-sticky pt-3 ">

        <ul class="nav flex-column item-hover ">
            @if (auth()->user()->role == 'admin')
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="#">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href={{ route('blogList') }}>
                        <i class="far fa-file-alt"></i>
                        Blog Request
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href={{ route('userManagement') }}>
                        <span data-feather="users"></span>
                        User Manage
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
