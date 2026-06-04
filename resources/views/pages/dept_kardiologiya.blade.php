@extends('layouts.app')

@section('content')
    <style>
        .dept_promo {
            margin: 3rem 0;
            padding: 2rem;
            background: linear-gradient(135deg, #014bff 0%, #0040e0 100%);
            border-radius: 30px;
        }

        .dept_promo h3 {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 1rem;
        }

        .promo_desc {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .promo_btn {
            display: inline-block;
            padding: 12px 32px;
            background: #ffffff;
            color: #014bff;
            border-radius: 100px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .promo_btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 800px) {
            .dept_promo {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }
        }
    </style>

    <body>
        <div class="dept_banner" style="background:#EF4444">
            <div class="dept_banner_inner">
                <div class="dept_banner_text">
                    <p class="dept_banner_breadcrumb"><a href="services.html" style="color:#fff;opacity:0.7">Услуги</a> /
                        Кардиология</p>
                    <h1 class="dept_banner_title" style="color:#fff">Кардиологическое отделение</h1>
                    <p class="dept_banner_tagline" style="color:#fff;opacity:0.85">Диагностика и лечение болезней сердца</p>
                    <a href="#accordion" class="dept_banner_btn"
                        style="border-color:rgba(255,255,255,0.5);color:#fff;background:rgba(255,255,255,0.15)">Смотреть
                        услуги и цены</a>
                </div>
            </div>
        </div>

        <div class="dept_content">
            <div class="dept_desc">
                <p>Кардиологическое отделение занимается диагностикой и лечением заболеваний сердца и сосудов у кошек и
                    собак. Болезни сердца у животных часто протекают скрыто, поэтому регулярные профилактические осмотры
                    особенно важны для питомцев старше 5 лет.</p>
                <p>Среди наших методов диагностики — эхокардиография, ЭКГ, рентгенография грудной клетки и суточный
                    мониторинг сердечного ритма (холтер).</p>
            </div>

            <!-- НОВЫЙ БЛОК: Акция -->
            <div class="dept_promo">
                <h3>❤️ Акция: Чек-ап сердца за полцены!</h3>
                <p class="promo_desc">При комплексном обследовании (ЭКГ + Эхокардиография) — скидка 50% на вторую процедуру.
                    Акция действует до 31 декабря.</p>
                <a href="#" class="promo_btn">Записаться на акцию</a>
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
                                        <a href="#" class="acc_row_btn">Записаться</a>
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

            // Функция для авторизации
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

            // Функция для регистрации
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

            // Привязываем функции к кнопкам (вызовите после загрузки страницы)
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
