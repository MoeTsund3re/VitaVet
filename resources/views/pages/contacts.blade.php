@extends('layouts.app')

@section('content')

    <body>
        <!-- PAGE -->
        <div class="contacts_page">
            <div class="contacts_sup">Контакты</div>
            <h1 class="contacts_title">Мы здесь, чтобы помочь</h1>

            <!-- MAIN MAP + INFO -->
            <div class="contacts_main">
                <!-- INTERACTIVE MAP — Kazan, ul. Baumana 44 -->
                <div class="contacts_map_wrap">
                    <iframe
                        src="https://yandex.ru/map-widget/v1/?ll=49.122684%2C55.796167&z=16&pt=49.122684,55.796167,pm2rdm&l=map"
                        frameborder="0" allowfullscreen title="Карта расположения клиники"></iframe>
                </div>

                <!-- INFO -->
                <div class="contacts_info">
                    <div class="contacts_info_title">Ветеринарная<br />клиника</div>

                    <div class="contacts_block">
                        <div class="contacts_block_label">Адрес</div>
                        <div class="contacts_block_value">
                            г. Казань, ул. Баумана, д. 44
                        </div>
                        <div class="contacts_block_sub">Республика Татарстан, 420015</div>
                    </div>

                    <div class="contacts_divider"></div>

                    <div class="contacts_block">
                        <div class="contacts_block_label">Время работы</div>
                        <div class="contacts_block_value">Круглосуточно, 24/7</div>
                        <div class="contacts_block_sub">Без выходных и праздников</div>
                    </div>

                    <div class="contacts_divider"></div>

                    <div class="contacts_block">
                        <div class="contacts_block_label">Как добраться</div>
                        <div class="route_list">
                            <div class="route_item">
                                <div class="route_badge rb_metro">🚇</div>
                                <div class="route_text">
                                    <div class="route_time">7 минут пешком</div>
                                    <div class="route_desc">от станции метро «Площадь Тукая»</div>
                                </div>
                            </div>
                            <div class="route_item">
                                <div class="route_badge rb_bus">🚌</div>
                                <div class="route_text">
                                    <div class="route_time">1 минута пешком</div>
                                    <div class="route_desc">от остановки «Ул. Баумана»</div>
                                </div>
                            </div>
                            <div class="route_item">
                                <div class="route_badge rb_car">🚗</div>
                                <div class="route_text">
                                    <div class="route_time">Парковка рядом</div>
                                    <div class="route_desc">
                                        Платная стоянка на ул. Кремлёвской
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="tel:+78435550000" class="contacts_call_btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.58 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.96a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        +7 (843) 555-00-00
                    </a>
                </div>
            </div>

            <!-- INFO CARDS -->
            <div class="contacts_cards">
                <div class="contacts_card">
                    <div class="contacts_card_icon cci_blue">📞</div>
                    <div class="contacts_card_label">Телефон</div>
                    <div class="contacts_card_value">+7 (843) 555-00-00</div>
                    <div class="contacts_card_sub">Работаем круглосуточно</div>
                </div>

                <div class="contacts_card">
                    <div class="contacts_card_icon cci_green">✉️</div>
                    <div class="contacts_card_label">Электронная почта</div>
                    <div class="contacts_card_value">info@vetclinic.ru</div>
                    <div class="contacts_card_sub">Ответим в течение 2 часов</div>
                </div>

                <div class="contacts_card">
                    <div class="contacts_card_icon cci_yellow">💬</div>
                    <div class="contacts_card_label">Мессенджеры</div>
                    <div class="contacts_card_value">WhatsApp, Telegram</div>
                    <div class="contacts_card_sub">@vetclinic_kazan</div>
                </div>
            </div>
        </div>
        <!-- /contacts_page -->

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
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <a href="#" class="auth_forgot">Забыли пароль?</a>
                    <button class="auth_submit" onclick="location.href = 'profile.html'">
                        Войти
                    </button>
                    <button class="auth_switch" onclick="switchToReg()">
                        Нет аккаунта? <span>Зарегистрироваться</span>
                    </button>
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
                    <button class="auth_switch" onclick="switchToLogin()">
                        Уже есть аккаунт? <span>Войти</span>
                    </button>
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
