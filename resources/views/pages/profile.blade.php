@extends('layouts.app')

@section('content')
    <style>
        .profile_page {
            margin-top: 20px;
        }

        .pet_card {
            background: #23233a;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            position: relative;
        }

        .pet_card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .pet_emoji {
            font-size: 48px;
            flex-shrink: 0;
        }

        .pet_info {
            flex: 1;
        }

        .pet_name {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 5px;
        }

        .pet_details {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
        }

        .pet_actions {
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        .pet_btn {
            padding: 6px 12px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            border: none;
        }

        .pet_btn_edit {
            background: rgba(1, 75, 255, 0.15);
            color: #014bff;
        }

        .pet_btn_delete {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .pet_btn:hover {
            transform: translateY(-1px);
        }

        .pets_grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Карточка для добавления нового питомца */
        .add_pet_card {
            background: rgba(35, 35, 58, 0.5);
            border: 2px dashed rgba(1, 75, 255, 0.3);
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            transition: all 0.2s;
            cursor: pointer;
            text-decoration: none;
            min-height: 120px;
        }

        .add_pet_card:hover {
            border-color: #014bff;
            background: rgba(1, 75, 255, 0.1);
            transform: translateY(-4px);
        }

        .add_pet_icon {
            font-size: 36px;
            color: #014bff;
        }

        .add_pet_text {
            font-size: 16px;
            font-weight: 600;
            color: #014bff;
        }

        /* Заголовок с кнопкой добавления */
        .profile_header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .profile_header_left {
            flex: 1;
        }

        .add_pet_header_btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #014bff;
            border-radius: 100px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            margin-bottom: 8px;
        }

        .add_pet_header_btn:hover {
            background: #0040e0;
            transform: translateY(-2px);
        }
    </style>

    <body>
        <div class="profile_page" style="margin-top: 20px;">
            <div class="profile_layout">
                <!-- SIDEBAR -->
                <aside class="profile_sidebar">
                    <div class="profile_user_card">
                        <div class="profile_avatar">{{ substr($user->name, 0, 1) }}</div>
                        <div class="profile_user_name">{{ $user->name }}</div>
                        <div class="profile_user_email">{{ $user->email }}</div>
                    </div>
                    <nav class="profile_nav">
                        <a href="{{ route('profile') }}" class="profile_nav_item active">
                            <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="3" width="7" height="7" rx="1" />
                                <rect x="14" y="3" width="7" height="7" rx="1" />
                                <rect x="3" y="14" width="7" height="7" rx="1" />
                                <rect x="14" y="14" width="7" height="7" rx="1" />
                            </svg>
                            Мои питомцы
                        </a>
                        <a href="{{ route('appointments.my') }}" class="profile_nav_item">
                            <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>
                            Мои записи
                        </a>
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="profile_nav_item"
                                style="width: 100%; text-align: left; background: none; border: none; cursor: pointer;">
                                <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" y1="12" x2="9" y2="12" />
                                </svg>
                                Выйти
                            </button>
                        </form>
                    </nav>
                </aside>

                <!-- MAIN -->
                <main class="profile_main">
                    <div class="profile_header">
                        <div class="profile_header_left">
                            <h1 class="profile_section_title">Мои питомцы</h1>
                            <p class="profile_section_sub">
                                Создайте профиль для каждого питомца, чтобы отслеживать историю лечения
                            </p>
                        </div>
                        @php
                            $pets = \App\Models\Pet::where('user_id', $user->id)->where('is_active', true)->get();
                        @endphp
                        @if ($pets->count() > 0)
                            <a href="{{ route('pets.create') }}" class="add_pet_header_btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Добавить питомца
                            </a>
                        @endif
                    </div>

                    @if (session('success'))
                        <div
                            style="background: rgba(0,200,100,0.15); border: 1px solid #00c864; color: #00c864; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($pets->count() > 0)
                        <div class="pets_grid">
                            @foreach ($pets as $pet)
                                <div class="pet_card">
                                    <a href="{{ route('pet.profile', $pet->id) }}"
                                        style="text-decoration: none; display: flex; align-items: center; gap: 20px; flex: 1;">
                                        <div class="pet_emoji">{{ $pet->emoji }}</div>
                                        <div class="pet_info">
                                            <div class="pet_name">{{ $pet->name }}</div>
                                            <div class="pet_details">
                                                {{ $pet->type_ru }} • {{ $pet->gender_ru }} • {{ $pet->age }}
                                            </div>
                                            <div class="pet_details" style="margin-top: 4px;">
                                                @if ($pet->breed)
                                                    {{ $pet->breed }}
                                                @endif
                                                @if ($pet->weight)
                                                    • {{ $pet->weight }} кг
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <div class="pet_actions">
                                        <a href="{{ route('pets.edit', $pet->id) }}" class="pet_btn pet_btn_edit">Ред.</a>
                                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                                            onsubmit="return confirm('Вы уверены, что хотите удалить питомца?');"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="pet_btn pet_btn_delete">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Карточка для добавления нового питомца (всегда в конце списка) -->
                            <a href="{{ route('pets.create') }}" class="add_pet_card">
                                <div class="add_pet_icon">+</div>
                                <div class="add_pet_text">Добавить ещё питомца</div>
                            </a>
                        </div>
                    @else
                        <div class="profile_empty">
                            <div class="profile_empty_icon">🐾</div>
                            <div class="profile_empty_title">Питомцы не добавлены</div>
                            <div class="profile_empty_text">
                                Создайте профиль питомца, чтобы видеть историю посещений, список
                                прививок, назначения и ближайшие записи — всё в одном месте.
                            </div>
                            <a href="{{ route('pets.create') }}" class="profile_create_btn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Добавить питомца
                            </a>
                        </div>
                    @endif

                    <!-- PROMO CARDS -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 20px;">
                        <div class="info_card"
                            style="background: rgba(1, 75, 255, 0.1); border: 1px solid rgba(1, 75, 255, 0.2);">
                            <div class="info_card_label">Запись онлайн</div>
                            <div class="info_card_value" style="font-size: 17px; line-height: 1.4">
                                Запишитесь к врачу не выходя из дома
                            </div>
                            <a href="{{ route('services') }}"
                                style="color: #014bff; font-size: 14px; font-weight: 700; margin-top: 4px;">Выбрать услугу
                                →</a>
                        </div>
                        <div class="info_card"
                            style="background: rgba(0, 200, 100, 0.08); border: 1px solid rgba(0, 200, 100, 0.2);">
                            <div class="info_card_label">Телефон клиники</div>
                            <div class="info_card_value" style="font-size: 17px; line-height: 1.4">
                                +7 (812) 000-00-00
                            </div>
                            <div class="info_card_sub">Работаем круглосуточно</div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- AUTH DRAWER -->
        <div class="auth_overlay" id="authOverlay" onclick="closeAuth()"></div>
        <div class="auth_drawer" id="authDrawer">
            <button class="auth_close" onclick="closeAuth()">&#x2715;</button>
            <div class="auth_panel" id="loginPanel">
                <h2 class="auth_title">Добро пожаловать</h2>
                <p class="auth_subtitle">Войдите в свой аккаунт</p>
                <div class="auth_form">
                    <div class="auth_field">
                        <label class="auth_label">Электронная почта</label>
                        <input type="email" class="auth_input" placeholder="example@mail.ru" />
                    </div>
                    <div class="auth_field">
                        <label class="auth_label">Пароль</label>
                        <div class="auth_input_wrap">
                            <input type="password" class="auth_input" id="loginPass" placeholder="••••••••" />
                            <button class="auth_eye" onclick="togglePass('loginPass', this)" tabindex="-1">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <a href="#" class="auth_forgot">Забыли пароль?</a>
                    <button class="auth_submit">Войти</button>
                    <button class="auth_switch" onclick="switchToReg()">Нет аккаунта?
                        <span>Зарегистрироваться</span></button>
                </div>
            </div>
            <div class="auth_panel" id="regPanel" style="display: none">
                <h2 class="auth_title">Создать аккаунт</h2>
                <p class="auth_subtitle">Заполните данные для регистрации</p>
                <div class="auth_form">
                    <div class="auth_field">
                        <label class="auth_label">Имя</label>
                        <input type="text" class="auth_input" placeholder="Иван Иванов" />
                    </div>
                    <div class="auth_field">
                        <label class="auth_label">Электронная почта</label>
                        <input type="email" class="auth_input" placeholder="example@mail.ru" />
                    </div>
                    <div class="auth_field">
                        <label class="auth_label">Пароль</label>
                        <div class="auth_input_wrap">
                            <input type="password" class="auth_input" id="regPass" placeholder="••••••••" />
                            <button class="auth_eye" onclick="togglePass('regPass', this)" tabindex="-1">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="auth_field">
                        <label class="auth_label">Повторите пароль</label>
                        <div class="auth_input_wrap">
                            <input type="password" class="auth_input" id="regPass2" placeholder="••••••••" />
                            <button class="auth_eye" onclick="togglePass('regPass2', this)" tabindex="-1">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button class="auth_submit">Зарегистрироваться</button>
                    <button class="auth_switch" onclick="switchToLogin()">Уже есть аккаунт? <span>Войти</span></button>
                </div>
            </div>
        </div>

        <script>
            function openAuth() {
                document.getElementById("authDrawer").classList.add("auth_open");
                document.getElementById("authOverlay").classList.add("auth_overlay_show");
                document.body.style.overflow = "hidden";
            }

            function closeAuth() {
                document.getElementById("authDrawer").classList.remove("auth_open");
                document.getElementById("authOverlay").classList.remove("auth_overlay_show");
                document.body.style.overflow = "";
            }

            function switchToReg() {
                document.getElementById("loginPanel").style.display = "none";
                document.getElementById("regPanel").style.display = "block";
            }

            function switchToLogin() {
                document.getElementById("regPanel").style.display = "none";
                document.getElementById("loginPanel").style.display = "block";
            }

            function togglePass(id, btn) {
                const i = document.getElementById(id);
                i.type = i.type === "password" ? "text" : "password";
                btn.style.opacity = i.type === "text" ? "1" : "0.5";
            }

            function submitLogin() {
                const formData = {
                    email: document.querySelector('#loginPanel input[type="email"]').value,
                    password: document.querySelector('#loginPanel input[type="password"]').value,
                    _token: document.querySelector('meta[name="csrf-token"]').content
                };
                fetch('{{ route('login') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': formData._token
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.message || 'Ошибка входа');
                        }
                    })
                    .catch(error => {
                        alert('Произошла ошибка');
                    });
            }

            function submitRegister() {
                const formData = {
                    name: document.querySelector('#regPanel input[placeholder="Иван Иванов"]').value,
                    email: document.querySelector('#regPanel input[placeholder="example@mail.ru"]').value,
                    password: document.getElementById('regPass').value,
                    password_confirmation: document.getElementById('regPass2').value,
                    _token: document.querySelector('meta[name="csrf-token"]').content
                };
                fetch('{{ route('register') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': formData._token
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            alert('Ошибка регистрации');
                        }
                    })
                    .catch(error => {
                        alert('Произошла ошибка');
                    });
            }
            document.addEventListener('DOMContentLoaded', function() {
                const loginBtn = document.querySelector('#loginPanel .auth_submit');
                const regBtn = document.querySelector('#regPanel .auth_submit');
                if (loginBtn) {
                    loginBtn.onclick = function(e) {
                        e.preventDefault();
                        submitLogin();
                    };
                }
                if (regBtn) {
                    regBtn.onclick = function(e) {
                        e.preventDefault();
                        submitRegister();
                    };
                }
            });
        </script>
    </body>
@endsection
