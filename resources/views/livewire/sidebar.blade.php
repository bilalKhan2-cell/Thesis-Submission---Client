<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">

        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/layouts/downloads.ico') }}" class="img-fluid" alt="University Logo" />
            </span>

            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @foreach ($routes as $key => $value)
            <li class="menu-item">
                <a href="{{ route($value['path_to_redirect']) }}" wire:navigate class="menu-link">
                    <i class="menu-icon tf-icons {{$value['route_icon']}}"></i>
                    <div data-i18n="">{{ $value['name'] }}</div>
                </a>
            </li>
        @endforeach

    </ul>
</aside>
