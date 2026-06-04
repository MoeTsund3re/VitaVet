<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ветеринарная клиника')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/promotions.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/contacts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dept.css') }}" />

    @stack('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet" />
</head>

<body>

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    <!-- Подключаем скрипт для записи -->
    <script src="{{ asset('assets/js/appointment.js') }}"></script>
</body>

</html>
