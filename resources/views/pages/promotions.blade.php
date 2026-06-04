@extends('layouts.app')

@section('content')

    <body>

        <!-- PROMOTIONS PAGE -->
        <div class="promotions_page">
            <h1 class="promotions_title">Акции и спецпредложения</h1>
            <p class="promotions_subtitle">
                Экономьте на здоровье ваших питомцев вместе с нами
            </p>

            <div class="promotions_grid">
                <!-- 1. -35% на чекап (wide) -->
                <div class="promo_card promo_card--wide">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo1.png&quot;);
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Акция</span>
                            <h2 class="promo_title">-35% на чекап для собак и кошек</h2>
                            <div class="promo_price">
                                <span class="promo_current_price">от 6 500 ₽</span>
                                <span class="promo_old_price">10 000 ₽</span>
                            </div>
                            <p class="promo_desc">
                                Скидка на полный чекап для вашего питомца до 30 июня в Vetcity
                                на пр. Маршала Жукова, 65
                            </p>
                            <a href="https://vet.city/check-up-special-offer/?utm_source=site&utm_medium=offers&utm_campaign=-35%25_checkup"
                                class="promo_link" target="_blank">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- 2. -20% на МРТ ночью (normal) -->
                <div class="promo_card promo_card--normal">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo2.png&quot;);
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Акция</span>
                            <h2 class="promo_title">-20% на МРТ ночью</h2>
                            <div class="promo_price">
                                <span class="promo_current_price">от 7 900 ₽</span>
                                <span class="promo_old_price">9 900 ₽</span>
                            </div>
                            <p class="promo_desc">
                                МРТ-исследование по специальной цене с 21:00 до 9:00 в Vetcity в
                                пер. Зубарев, 7
                            </p>
                            <a href="https://vet.city/services/mrt/?utm_source=site&utm_medium=offers&utm_campaign=-20%25_mrt#night_mrt"
                                class="promo_link" target="_blank">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- 3. Сниженные цены на КТ (normal) -->
                <div class="promo_card promo_card--normal">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo3.png&quot;);
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Спецпредложение</span>
                            <h2 class="promo_title">Сниженные цены на КТ с анестезией</h2>
                            <div class="promo_price">
                                <span class="promo_current_price">от 12 300 ₽</span>
                                <span class="promo_old_price">15 400 ₽</span>
                            </div>
                            <p class="promo_desc">
                                Действует на все виды КТ и любое количество отделов в обоих
                                филиалах
                            </p>
                            <a href="https://vet.city/services/vizualnaya-diagnostika/#kt" class="promo_link"
                                target="_blank">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- 4. Бесплатный прием хирурга (square - promo3 квадратная) -->
                <div class="promo_card promo_card--square">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo3.png&quot;);
              background-size: cover;
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Акция</span>
                            <h2 class="promo_title">Бесплатный прием хирурга после МРТ</h2>
                            <div class="promo_price">
                                <span class="promo_current_price">0 ₽</span>
                                <span class="promo_old_price">5 000 ₽</span>
                            </div>
                            <p class="promo_desc">
                                Бесплатная консультация ортопеда при показании на операцию после
                                МРТ позвоночника
                            </p>
                            <a href="https://vet.city/services/khirurgiya/#sezon_vygodnoy_khirurgii" class="promo_link"
                                target="_blank">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- 5. -30% на консультацию хирурга (normal) -->
                <div class="promo_card promo_card--normal">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo4.png&quot;);
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Акция</span>
                            <h2 class="promo_title">
                                -30% на консультацию хирурга перед операцией
                            </h2>
                            <div class="promo_price">
                                <span class="promo_current_price">3 500 ₽</span>
                                <span class="promo_old_price">5 000 ₽</span>
                            </div>
                            <p class="promo_desc">
                                Дополнительный бонус — скидка 10% на саму операцию
                            </p>
                            <a href="https://vet.city/services/khirurgiya/#sezon_vygodnoy_khirurgii" class="promo_link"
                                target="_blank">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- 6. Скидка на кастрацию (wide) -->
                <div class="promo_card promo_card--wide">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo5.jpg&quot;);
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Суперскидка</span>
                            <h2 class="promo_title">
                                Скидка на кастрацию и стерилизацию до 54%
                            </h2>
                            <div class="promo_price">
                                <span class="promo_current_price">от 10 600 ₽</span>
                                <span class="promo_old_price">23 200 ₽</span>
                            </div>
                            <p class="promo_desc">
                                Суперскидка на первичный прием хирурга, анализы и саму операцию
                            </p>
                            <a href="https://promo.vet.city/?utm_source=site&utm_medium=special-offer&utm_campaign=kastracia"
                                class="promo_link" target="_blank">Подробнее →</a>
                        </div>
                    </div>
                </div>

                <!-- 7. Вакцинация питомцев (normal) -->
                <div class="promo_card promo_card--normal">
                    <div class="promo_card_inner"
                        style="
              background-image: url(&quot;assets/images/promotion/promo6.png&quot;);
            ">
                        <div class="promo_overlay"></div>
                        <div class="promo_content">
                            <span class="promo_badge">Профилактика</span>
                            <h2 class="promo_title">Вакцинация питомцев</h2>
                            <div class="promo_price">
                                <span class="promo_current_price">от 2 200 ₽</span>
                            </div>
                            <p class="promo_desc">
                                Прививаем кошек, собак и экзотических питомцев
                                сертифицированными препаратами — для защиты от инфекций и выезда
                                за границу
                            </p>
                            <a href="#" class="promo_link">Подробнее →</a>
                        </div>
                    </div>
                </div>
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
                    <button class="auth_submit" onclick="location.href = 'profile.html'">
                        Зарегистрироваться
                    </button>
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

    </html>
@endsection
