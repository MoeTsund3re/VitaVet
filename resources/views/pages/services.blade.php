@extends('layouts.app')


@section('content')

    <body>

        <!-- SERVICES PAGE -->
        <div class="services_page">
            <h1 class="services_page_title">Наши услуги</h1>
            <p class="services_page_subtitle">
                Выберите отделение — мы позаботимся о вашем питомце
            </p>

            <!-- ═══════════════ BLOCK 1 ═══════════════ -->
            <!--
                                Layout: [Диагностика + Вакцинация] | [Терапия] | [Стоматология + Онкология]
                                Center card: image left, text bottom-right
                              -->
            <div class="dept_block">
                <!-- LEFT COL -->
                <div class="dept_col">
                    <!-- Диагностика: bg #E697A2, img 229x200 left, text right, 450x200 -->
                    <div class="dept_card dept_card_sm bg_pink" onclick="location.href = '{{ route('diagnostika') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_lr">
                            <img src="assets/images/service/diagnoistic.png" alt="Диагностика"
                                class="dept_img img_diagnostika" onerror="this.style.display = 'none'" />
                            <span class="dept_label">Лабораторная<br />диагностика</span>
                        </div>
                    </div>

                    <!-- Вакцинация: bg #00C864, img 280x212 overflows bottom, text right, 450x200 -->
                    <div class="dept_card dept_card_sm bg_green" onclick="location.href = '{{ route('neurologiya') }}'"
                        style="cursor: pointer" style="overflow: visible">
                        <div class="card_inner_lr" style="overflow: visible">
                            <img src="assets/images/service/vacine.png" alt="Неврология" class="dept_img img_vakcinaciya"
                                onerror="this.style.display = 'none'" />
                            <span class="dept_label dept_label_white">Неврология</span>
                        </div>
                    </div>
                </div>

                <!-- CENTER COL: Терапия, 350x430, img 272x403, text bottom-right -->
                <div class="dept_col_center">
                    <div class="dept_card dept_card_lg bg_gray" onclick="location.href = '{{ route('terapiya') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_tall" style="position: relative; height: 100%">
                            <img src="assets/images/service/therapy.png" alt="Терапия" class="dept_img img_terapiya"
                                onerror="this.style.display = 'none'" />
                            <span class="dept_label"
                                style="
                  position: absolute;
                  bottom: 24px;
                  right: 20px;
                  text-align: right;
                  max-width: 160px;
                  color: #ffffff;
                ">Терапия</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COL -->
                <div class="dept_col">
                    <!-- Стоматология: bg #CEDE59, img 312x174 right corner overflows bottom, text left, 450x200 -->
                    <div class="dept_card dept_card_sm bg_yellow" onclick="location.href = '{{ route('stomatologiya') }}'"
                        style="cursor: pointer" style="overflow: visible">
                        <div class="card_inner_rl" style="overflow: visible; align-items: flex-end; height: 100%">
                            <span class="dept_label"
                                style="padding: 24px 0 24px 24px; align-self: flex-start">Стоматология</span>
                            <img src="assets/images/service/dentistry.png" alt="Стоматология"
                                class="dept_img img_stomatologiya" onerror="this.style.display = 'none'" />
                        </div>
                    </div>

                    <!-- Онкология: bg #059E8C, img 208x194 right corner, text left, 450x200 -->
                    <div class="dept_card dept_card_sm bg_teal" onclick="location.href = '{{ route('onkologiya') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_rl" style="align-items: flex-end; height: 100%">
                            <span class="dept_label dept_label_white"
                                style="padding: 24px 0 24px 24px; align-self: flex-start">Онкология</span>
                            <img src="assets/images/service/oncology.png" alt="Онкология" class="dept_img img_onkologiya"
                                onerror="this.style.display = 'none'" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end BLOCK 1 -->

            <!-- ═══════════════ BLOCK 2 ═══════════════ -->
            <!--
                                Layout: [Дерматология + Офтальмология] | [Хирургия reversed] | [Травматология + Кардиология]
                                Center card reversed: image right, text bottom-left
                              -->
            <div class="dept_block">
                <!-- LEFT COL -->
                <div class="dept_col">
                    <!-- Дерматология: bg #FF8C42, img 240x190 left flush bottom, text right, 450x200 -->
                    <div class="dept_card dept_card_sm bg_orange" onclick="location.href = '{{ route('dermatologia') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_lr">
                            <img src="assets/images/service/dermatologia.png" alt="Дерматология"
                                class="dept_img img_dermatologiya" onerror="this.style.display = 'none'" />
                            <span class="dept_label dept_label_white">Дерматология</span>
                        </div>
                    </div>
                    <div class="dept_card dept_card_sm bg_purple" onclick="location.href = '{{ route('travmatologiya') }}'"
                        style="cursor: pointer" style="overflow: visible">
                        <div class="card_inner_lr" style="overflow: visible">
                            <img src="assets/images/service/trauma.png" alt="Травматология"
                                class="dept_img img_travmatologiya" onerror="this.style.display = 'none'" />
                            <span class="dept_label dept_label_white">Травматология</span>
                        </div>
                    </div>
                    <!-- Офтальмология: bg #38BDF8, img 220x200 right, text left, 450x200 -->
                </div>

                <!-- CENTER COL: Хирургия, 350x430, REVERSED — image right, text bottom-left -->
                <div class="dept_col_center">
                    <div class="dept_card dept_card_lg bg_blue" onclick="location.href = '{{ route('hirurgiya') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_tall" style="position: relative; height: 100%">
                            <img src="assets/images/service/surgery.png" alt="Хирургия" class="dept_img img_hirurgiya"
                                onerror="this.style.display = 'none'" />
                            <span class="dept_label dept_label_white"
                                style="
                  position: absolute;
                  bottom: 24px;
                  left: 20px;
                  text-align: left;
                  max-width: 160px;
                ">Хирургия</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COL -->
                <div class="dept_col">
                    <!-- Травматология: bg #8B5CF6, img 250x190 left overflows bottom, text right, 450x200 -->

                    <div class="dept_card dept_card_sm bg_sky" onclick="location.href = '{{ route('oftalmologiya') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_lr">
                            <img src="assets/images/service/ophthalmology.png" alt="Офтальмология"
                                class="dept_img img_oftalmologiya" onerror="this.style.display = 'none'" />
                            <span class="dept_label">Офтальмология</span>
                        </div>
                    </div>

                    <!-- Кардиология: bg #EF4444, img 220x190 right, text left, 450x200 -->
                    <div class="dept_card dept_card_sm bg_red" onclick="location.href = '{{ route('kardiologiya') }}'"
                        style="cursor: pointer">
                        <div class="card_inner_rl" style="align-items: flex-end; height: 100%">
                            <span class="dept_label dept_label_white"
                                style="padding: 24px 0 24px 24px; align-self: flex-start">Кардиология</span>
                            <img src="assets/images/service/cardiology.png" alt="Кардиология"
                                class="dept_img img_kardiologiya" onerror="this.style.display = 'none'" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end BLOCK 2 -->
        </div>
        <!-- end .services_page -->

        <!-- AUTH DRAWER -->
        <div class="auth_overlay" id="authOverlay" onclick="closeAuth()"></div>
        <div class="auth_drawer" id="authDrawer">
            <button class="auth_close" onclick="closeAuth()">&#x2715;</button>

            <!-- LOGIN FORM -->
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
                    <button class="auth_submit" onclick="location.href = 'profile.html'">
                        Войти
                    </button>
                    <button class="auth_switch" onclick="switchToReg()">
                        Нет аккаунта? <span>Зарегистрироваться</span>
                    </button>
                </div>
            </div>

            <!-- REGISTER FORM -->
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
        <!-- FOOTER (shared) -->
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
