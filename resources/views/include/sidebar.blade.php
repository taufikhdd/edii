<nav id="sidebar">
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu">
            <a href="/" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-home"></i>
                    <span> {{ __('Dashboards') }}</span>
                </div>
            </a>
        </li>

        @role('Super Admin')
            <li class="menu-title">{{ __('Admin') }}</li>

            <li class="menu">
                <a href="{{ route('users.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-lock"></i>
                        <span> {{ __('Pengguna') }}</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('roles.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-lock"></i>
                        <span> {{ __('Hak Akses') }}</span>
                    </div>
                </a>
            </li>
        @endrole

        <li class="menu-title">{{ __('Biodata') }}</li>

        {{-- <li class="menu">
            <a href="{{ route('laporans.index') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-chart-pie"></i>
                    <span> {{ __('Biodata Harian') }}</span>
                </div>
            </a>
        </li> --}}

        <li class="menu">
            <a href="{{ route('lapmingguans.index') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-chart-pie"></i>
                    <span> {{ __('Biodata') }}</span>
                </div>
            </a>
        </li>
    </ul>
</nav>
