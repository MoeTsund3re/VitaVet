@extends('layouts.app')

@section('content')
    <div class="profile_page">
        <div class="profile_layout">
            <aside class="profile_sidebar">
                <div class="profile_user_card">
                    <div class="profile_avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <div class="profile_user_name">{{ auth()->user()->name }}</div>
                    <div class="profile_user_email">{{ auth()->user()->email }}</div>
                    <div class="profile_user_role">Врач</div>
                </div>
            </aside>
            <main class="profile_main">
                <h1>Личный кабинет врача</h1>
                <p>Добро пожаловать, {{ auth()->user()->name }}!</p>
                <p>Вы вошли как врач.</p>

                <div style="margin-top: 30px;">
                    <h3>Статистика</h3>
                    <p>Здесь будет отображаться информация о записях и пациентах.</p>
                </div>
            </main>
        </div>
    </div>
@endsection
