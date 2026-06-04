<div class="header">
    <div class="inner_header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_2.png') }}" alt="" />
            </a>
        </div>
        <div class="header_nav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Главная</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Услуги</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">О нас</a>
            <a href="{{ route('promotions') }}" class="{{ request()->routeIs('promotions') ? 'active' : '' }}">Акции</a>
            <a href="{{ route('contacts') }}"
                class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a>
        </div>
        <div class="header_btn">
            @auth
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin_page') }}" class="header_auth">Админ панель</a>
                @elseif(auth()->user()->isDoctor())
                    <a href="{{ route('doctor') }}" class="header_auth">Кабинет врача</a>
                @else
                    <a href="{{ route('profile') }}" class="header_auth">Профиль</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="header_exit" style="margin-left: 10px;">Выйти</button>
                </form>
            @else
                <button class="header_reg" onclick="openAuth()">Войти</button>
            @endauth
        </div>
    </div>
</div>
