@extends('layouts.app')

@section('content')
    <style>
        .dept_rehab {
            margin: 3rem 0;
            padding: 2rem;
            background: #23233a;
            border-radius: 30px;
        }

        .dept_rehab h3 {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 1.5rem;
        }

        .rehab_grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .rehab_card {
            text-align: center;
            padding: 1.5rem;
            background: #1b1b29;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .rehab_card:hover {
            transform: translateY(-4px);
        }

        .rehab_icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .rehab_card h4 {
            font-size: 1rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .rehab_card p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
        }

        @media (max-width: 800px) {
            .rehab_grid {
                grid-template-columns: 1fr;
            }

            .dept_rehab {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }
        }
    </style>

    <body>
        <div class="dept_banner" style="background:#014bff">
            <div class="dept_banner_inner">
                <div class="dept_banner_text">
                    <p class="dept_banner_breadcrumb"><a href="{{ route('services') }}"
                            style="color:#fff;opacity:0.7">Услуги</a> / Хирургия</p>
                    <h1 class="dept_banner_title" style="color:#fff">Хирургическое отделение для животных</h1>
                    <p class="dept_banner_tagline" style="color:#fff;opacity:0.85">Проводим операции любой сложности</p>
                    <a href="#accordion" class="dept_banner_btn"
                        style="border-color:rgba(255,255,255,0.5);color:#fff;background:rgba(255,255,255,0.15)">Смотреть
                        услуги и цены</a>
                </div>
            </div>
        </div>

        <div class="dept_content">
            <div class="dept_desc">
                Наши опытные врачи оценивают риски для пациентов и определяют, как срочно нужна операция:
                <ol>
                    <li><strong>Экстренно</strong> — для спасения жизни питомца, сразу после поступления в клинику.</li>
                    <li><strong>Срочно</strong> — выполняется в ближайший день или дни.</li>
                    <li><strong>Планово</strong> — по записи, например, кастрация, пластика грыж, удаление опухолей.</li>
                </ol>
            </div>

            <div class="dept_rehab">
                <h3>Реабилитация после операций</h3>
                <div class="rehab_grid">
                    <div class="rehab_card">
                        <div class="rehab_icon">💧</div>
                        <h4>Водная терапия</h4>
                        <p>Гидрореабилитация для восстановления подвижности суставов</p>
                    </div>
                    <div class="rehab_card">
                        <div class="rehab_icon">⚡</div>
                        <h4>Физиотерапия</h4>
                        <p>Лазер и магнитотерапия для ускорения заживления</p>
                    </div>
                    <div class="rehab_card">
                        <div class="rehab_icon">📋</div>
                        <h4>Индивидуальная программа</h4>
                        <p>План восстановления с учётом породы и возраста</p>
                    </div>
                </div>
            </div>

            <div class="dept_accordion" id="accordion">
                <h2 class="dept_accordion_title">Услуги и цены</h2>

                @forelse($categories as $category)
                    @if ($category->services->count() > 0)
                        <div class="acc_item">
                            <button class="acc_header">
                                <span>{{ $category->name }}</span>
                                <svg class="acc_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </button>
                            <div class="acc_body">
                                @foreach ($category->services as $service)
                                    <div class="acc_row">
                                        <span class="acc_row_name">{{ $service->name }}</span>
                                        <span class="acc_row_price">{{ number_format($service->price, 0, '', ' ') }}
                                            ₽</span>
                                        <a href="#" class="acc_row_btn"
                                            onclick="openAppointmentModal({{ $service->id }}, '{{ addslashes($service->name) }}', '{{ addslashes($category->department) }}'); return false;">
                                            Записаться
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @empty
                    <div
                        style="background: #1a1a2e; border-radius: 16px; padding: 30px; text-align: center; color: rgba(255,255,255,0.4);">
                        Услуги в этом отделении будут добавлены в ближайшее время
                    </div>
                @endforelse
            </div>
        </div>

        <script>
            document.querySelectorAll('.acc_header').forEach(btn => {
                btn.addEventListener('click', () => {
                    const item = btn.parentElement;
                    const isOpen = item.classList.contains('acc_open');
                    document.querySelectorAll('.acc_item').forEach(i => i.classList.remove('acc_open'));
                    if (!isOpen) item.classList.add('acc_open');
                });
            });


        </script>

        <!-- AUTH DRAWER -->
        <div class="auth_overlay" id="authOverlay" onclick="closeAuth()"></div>
        <div class="auth_drawer" id="authDrawer">
            <button class="auth_close" onclick="closeAuth()">✕</button>
            <div class="auth_panel" id="loginPanel">
                <h2 class="auth_title">Добро пожаловать</h2>
                <p class="auth_subtitle">Войдите в свой аккаунт</p>
                <div class="auth_form">
                    <div class="auth_field"><label class="auth_label">Электронная почта</label><input type="email"
                            class="auth_input" placeholder="example@mail.ru" /></div>
                    <div class="auth_field"><label class="auth_label">Пароль</label>
                        <div class="auth_input_wrap"><input type="password" class="auth_input" id="loginPass"
                                placeholder="••••••••" /><button class="auth_eye" onclick="togglePass('loginPass', this)"
                                tabindex="-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg></button></div>
                    </div>
                    <a href="#" class="auth_forgot">Забыли пароль?</a>
                    <button class="auth_submit">Войти</button>
                    <button class="auth_switch" onclick="switchToReg()">Нет аккаунта?
                        <span>Зарегистрироваться</span></button>
                </div>
            </div>
            <div class="auth_panel" id="regPanel" style="display:none">
                <h2 class="auth_title">Создать аккаунт</h2>
                <p class="auth_subtitle">Заполните данные для регистрации</p>
                <div class="auth_form">
                    <div class="auth_field"><label class="auth_label">Имя</label><input type="text" class="auth_input"
                            placeholder="Иван Иванов" /></div>
                    <div class="auth_field"><label class="auth_label">Электронная почта</label><input type="email"
                            class="auth_input" placeholder="example@mail.ru" /></div>
                    <div class="auth_field"><label class="auth_label">Пароль</label>
                        <div class="auth_input_wrap"><input type="password" class="auth_input" id="regPass"
                                placeholder="••••••••" /><button class="auth_eye" onclick="togglePass('regPass', this)"
                                tabindex="-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg></button></div>
                    </div>
                    <div class="auth_field"><label class="auth_label">Повторите пароль</label>
                        <div class="auth_input_wrap"><input type="password" class="auth_input" id="regPass2"
                                placeholder="••••••••" /><button class="auth_eye" onclick="togglePass('regPass2', this)"
                                tabindex="-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg></button></div>
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
