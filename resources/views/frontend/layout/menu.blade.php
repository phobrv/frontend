<div class="panel-overlay"></div>
<div id="showmenu" class="hidden-xl-up">
    @include('svg.menu_bar')
</div>
<nav id="nav-menu">
    <div class="toplg hidden-xl-up">
        <a href="{{ route('home') }}">
            <img src="{{ $configs['logo_img'] ?? '' }}" class="w-100" alt="logo">
        </a>
    </div>
    <div class="menu-main-container d-flex justify-content-end">
        <ul id="menu-main">
            @if (!empty($configs['mainMenu']))
                @foreach ($configs['mainMenu'] as $m)
                    @if (isset($m->childs) && count($m->childs) > 0)
                        <li class="menu-item dropdown">
                            <a href="{{ $m->url }}">
                                {{ $m->title }}
                                <span class="hidden-lg-down">@include('svg.triangle')</span>
                            </a>
                            <span class="hidden-md-up">@include('svg.arrow_down2')</span>
                            <ul class="dropdown-menu">
                                @foreach ($m->childs as $sub)
                                    <li class="dropdown-item">
                                        <a title="{{ $sub->title }}" href="{{ $sub->url }}">
                                            {{ $sub->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="{{ $m->url ?? '' }}">{{ $m->title ?? '' }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
            {{-- <li class="hidden-md-up">
                @include('phont::frontend.components.formSearchMobile')

            </li> --}}
            @include('phont::frontend.components.formSearchSort')
        </ul>
    </div>
</nav>
