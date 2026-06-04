@extends('layouts.app')

@section('content')
    <style>
        .dept_tech {
            margin: 3rem 0;
            padding: 2rem;
            background: #23233a;
            border-radius: 30px;
        }

        .dept_tech h3 {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 1.5rem;
        }

        .tech_grid {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .tech_item {
            flex: 1;
            text-align: center;
            padding: 1.5rem;
            background: #1b1b29;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .tech_item:hover {
            transform: translateY(-4px);
        }

        .tech_icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .tech_item strong {
            display: block;
            font-size: 1rem;
            color: #014bff;
            margin-bottom: 0.5rem;
        }

        .tech_item p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
        }

        @media (max-width: 800px) {
            .tech_grid {
                flex-direction: column;
            }

            .dept_tech {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }
        }
    </style>

    <body>
        <div class="dept_banner" style="background:#E697A2">
            <div class="dept_banner_inner">
                <div class="dept_banner_text">
                    <p class="dept_banner_breadcrumb"><a href="{{ route('services') }}"
                            style="color:#1b1b29;opacity:0.7">Услуги</a> / Лабораторная диагностика</p>
                    <h1 class="dept_banner_title" style="color:#1b1b29">Лабораторное и инструментальное отделение</h1>
                    <p class="dept_banner_tagline" style="color:#1b1b29;opacity:0.85">Точные анализы и быстрый результат</p>
                    <a href="#accordion" class="dept_banner_btn"
                        style="border-color:rgba(0,0,0,0.3);color:#1b1b29;background:rgba(0,0,0,0.1)">Смотреть услуги и
                        цены</a>
                </div>
            </div>
        </div>

        <div class="dept_content">
            <div class="dept_desc">
                <p>Наша лаборатория оснащена современным оборудованием, позволяющим проводить широкий спектр исследований
                    прямо в клинике. Большинство анализов готовы в течение 1–2 часов.</p>
                <p>Мы выполняем общеклинические, биохимические, гормональные, серологические и цитологические исследования,
                    а также инструментальную диагностику: УЗИ, рентген, МРТ, КТ.</p>
            </div>

            <div class="dept_tech">
                <h3>Технологии, которым мы доверяем</h3>
                <div class="tech_grid">
                    <div class="tech_item">
                        <div class="tech_icon">🔬</div><strong>Гематологический анализатор Mindray</strong>
                        <p>Точный подсчёт форменных элементов крови за 60 секунд</p>
                    </div>
                    <div class="tech_item">
                        <div class="tech_icon">📊</div><strong>Биохимический анализатор</strong>
                        <p>Определение 20+ показателей крови с высокой точностью</p>
                    </div>
                    <div class="tech_item">
                        <div class="tech_icon">📡</div><strong>МРТ 1.5 Тесла</strong>
                        <p>Детальная визуализация мягких тканей и головного мозга</p>
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
                        Услуги в этом отделении будут добавлены в ближайшее время</div>
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

        <!-- AUTH DRAWER (аналогичный предыдущим) -->
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
                }).then(response => response.json()).then(data => {
                    if (data.success) {
                        window.location.href = data.redirect;
                    } else {
                        alert(data.message || 'Ошибка входа');
                    }
                }).catch(error => {
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
                }).then(response => response.json()).then(data => {
                    if (data.success) {
                        window.location.href = data.redirect;
                    } else {
                        alert('Ошибка регистрации');
                    }
                }).catch(error => {
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
