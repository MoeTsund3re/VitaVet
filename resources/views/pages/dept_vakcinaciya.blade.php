@extends('layouts.app')

@section('content')
    <style>
        .dept_faq {
            margin: 3rem 0;
            padding: 2rem;
            background: #23233a;
            border-radius: 30px;
        }

        .dept_faq h3 {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 1.5rem;
        }

        .faq_item {
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .faq_item:last-child {
            border-bottom: none;
        }

        .faq_question {
            font-size: 1.1rem;
            font-weight: 700;
            color: #014bff;
            margin-bottom: 0.5rem;
        }

        .faq_answer {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.5;
        }

        @media (max-width: 800px) {
            .dept_faq {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }
        }
    </style>

    <body>
        <div class="dept_banner" style="background:#00C864">
            <div class="dept_banner_inner">
                <div class="dept_banner_text">
                    <p class="dept_banner_breadcrumb"><a href="{{ route('services') }}"
                            style="color:#1b1b29;opacity:0.7">Услуги</a> / Неврология</p>
                    <h1 class="dept_banner_title" style="color:#1b1b29">Отделение неврологии и профилактики</h1>
                    <p class="dept_banner_tagline" style="color:#1b1b29;opacity:0.85">Защищаем здоровье питомцев с первых
                        месяцев</p>
                    <a href="#accordion" class="dept_banner_btn"
                        style="border-color:rgba(0,0,0,0.3);color:#1b1b29;background:rgba(0,0,0,0.1)">Смотреть услуги и
                        цены</a>
                </div>
            </div>
        </div>

        <div class="dept_content">
            <div class="dept_desc">
                <p>Неврологическое отделение специализируется на диагностике и лечении заболеваний нервной системы у кошек и
                    собак. Наши врачи проводят комплексное обследование, включая МРТ, ЭНМГ и другие современные методы
                    диагностики.</p>
                <p>Судороги, нарушение координации, слабость конечностей, изменение поведения — всё это повод для
                    консультации невролога.</p>
            </div>

            <div class="dept_faq">
                <h3>Часто задаваемые вопросы</h3>
                <div class="faq_item">
                    <div class="faq_question">❓ Какие симптомы требуют срочного обращения к неврологу?</div>
                    <div class="faq_answer">Судороги, потеря сознания, нарушение координации, параличи, резкое изменение
                        поведения.</div>
                </div>
                <div class="faq_item">
                    <div class="faq_question">❓ Нужна ли специальная подготовка к приёму?</div>
                    <div class="faq_answer">По возможности запишите на видео эпизоды беспокойного поведения питомца.</div>
                </div>
                <div class="faq_item">
                    <div class="faq_question">❓ Как долго длится приём?</div>
                    <div class="faq_answer">Первичный приём занимает 40-60 минут.</div>
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

        <!-- AUTH DRAWER (аналогичный) -->
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
