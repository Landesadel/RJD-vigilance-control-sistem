<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="nav-link @if(request()->routeIs('index')) active @endif" aria-current="page"  href="{{url(\App\Classes\Helpers::getHost() . '/')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link @if(request()->routeIs('crew.*')) active @endif" href="{{url(\App\Classes\Helpers::getHost() . '/crews/create')}}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Добавить бригаду
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('users.*')) active @endif mb-3" href="{{url(\App\Classes\Helpers::getHost() . '/users/create')}}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                     Внести данные
                </a>
            </li>
        </ul>
        <nav class="small px-4" id="toc">
            <a href="{{url(\App\Classes\Helpers::getHost() . '/crews')}}" class="btn btn-sm btn-outline-secondary">Список бригад</a>
        </nav>
    </div>
</nav>
