<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('index')) active @endif" href="{{ route('index') }}">{{ __('navbar.index_page') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('crud.category.index')) active @endif" href="{{ route('crud.category.index') }}">{{ __('navbar.categories_page') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('crud.lot.index')) active @endif" href="{{ route('crud.lot.index') }}">{{ __('navbar.lots_page') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
