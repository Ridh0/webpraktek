<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">

                <li class="nav-item {{(request()->segment(1)=='home') ? 'active': ''}} ">
                    <a href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item {{(request()->segment(1)=='pasien') ? 'active': ''}} ">
                    <a href="{{route('pasien')}}">
                        <i class="fas fa-users"></i>
                        <p>Pasien</p>
                    </a>
                </li>
                <li class="nav-item {{(request()->segment(1)=='pelayanan') ? 'active': ''}}">
                    <a href="{{route('pelayanan')}}">
                        <i class="fas fa-vial"></i>
                        <p>Pelayanan Pasien</p>
                    </a>
                </li>
                <li class="nav-item {{(request()->segment(1)=='pendaftaran') ? 'active': ''}}">
                    <a href="{{route('pendaftaran')}}">
                        <i class="fas fa-user-plus"></i>
                        <p>Pendaftaran Pasien</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>