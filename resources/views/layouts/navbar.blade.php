<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <h2 class="text-white">Admin </h2>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm avatar-online">
                        <span class="avatar-title rounded-circle  bg-light fw-bold">{{substr(auth()->user()->name,0,1)}}</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <div class="avatar avatar-offline">
                                        <span class="avatar-img rounded avatar-title rounded-circle border border-white bg-secondary">{{substr(auth()->user()->name,0,1)}}</span>
                                    </div>
                                </div>
                                <div class="u-text">
                                    <h4>{{auth()->user()->name}}</h4>
                                    <p class="text-muted">{{auth()->user()->email}}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>