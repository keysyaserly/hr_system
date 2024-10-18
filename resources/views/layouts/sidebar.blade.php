<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Menu -->
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('dashboard') ? '' : 'collapsed' }}"
                href="{{ route('dashboard') }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Forms Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('employee.create') ? '' : 'collapsed' }}"
                        href="{{ route('employee.create') }}">
                        <i class="bi bi-circle"></i><span>Tambah Karyawan</span>
                    </a>
                </li>


                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('violations.create') ? '' : 'collapsed' }}"
                        href="{{ route('violations.create') }}">
                        <i class="bi bi-circle"></i><span>Tambah pelanggaran</span>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Tables Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    @can('isadmin')
                    <li>
                        <a class="nav-link {{ Route::currentRouteNamed('employee.index') ? '' : 'collapsed' }}"
                            href="{{ route('employee.index') }}">
                            <i class="bi bi-layers-fill"></i><span>Data Karyawan</span>
                        </a>
                    </li>
                @endcan

                    <li>
                        <a class="nav-link" href="{{ route('violations.index') }}">
                            <i class="bi bi-layers-fill"></i><span>Data pelanggaran</span>
                        </a>
                    </li>





                <li>
                    </a>
                </li>
            </ul>

        </li>
        <!-- Tables arsip-->
        <li>
            <a class="nav-link {{ Route::currentRouteNamed('employee.index') ? '' : 'collapsed' }}"
                href="{{ route('employee.index') }}">
                <i class="bi bi-layers-fill"></i><span>arsip</span>
            </a>
        </li>

        <!-- Tables absen-->
        <li>
            <a class="nav-link {{ Route::currentRouteNamed('employee.index') ? '' : 'collapsed' }}"
                href="{{ route('employee.index') }}">
                <i class="bi bi-layers-fill"></i><span>absen </span>
            </a>
        </li>

    </ul>

<!-- Logout Menu -->
<li class="nav-item">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="nav-link collapsed" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
    </a>
</li>

</aside><!-- End Sidebar -->
