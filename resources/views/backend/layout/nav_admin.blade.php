<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @foreach (config('nav_admin') as $nav)
                <li class="nav-item">
                    @php
                        $isActive = str_contains(
                            request()
                                ->route()
                                ->getName(),
                            $nav['active'],
                        );
                    @endphp
                    <a class="nav-link {{ $isActive ? 'active' : '' }}" href="{{ route($nav['link']) }}">
                        <span data-feather="{{ $nav['icon'] }}"></span>
                        {{ $nav['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
