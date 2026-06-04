@extends('layouts.app')

@section('content')

    <body>

        <!-- BANNER -->
        <div class="banner">
            <!-- TOP BANNER -->
            <div class="top_banner">
                <div class="top_banner_inner">
                    <div class="top_banner_text">
                        <h1 class="top_banner_title">
                            Забота о вашем <br />
                            питомце — <span style="color: #014bff">наша миссия</span>
                        </h1>
                        <p class="top_banner_desc">
                            Современная ветеринарная клиника с онлайн-записью, доступом к
                            результатам анализов и личным кабинетом для каждого питомца.
                        </p>
                        <div class="top_banner_btns">
                            <button class="btn_zapisat">Записаться</button>
                            <button class="btn_uslugi">Услуги</button>
                        </div>
                    </div>
                    <!-- Top banner image — overflows downward onto bot_banner -->
                    <div class="top_banner_img_placeholder">
                        <img src="{{ asset('assets/images/top_banner.png') }}" alt="Питомец" class="top_banner_pet_img" />
                    </div>
                </div>
            </div>

            <!-- BOTTOM BANNER (slider) -->
            <div class="bot_banner">
                <div class="slider_wrapper">
                    <!-- Slides -->
                    <div class="slider_track">
                        <div class="slide active">
                            <div class="slide_text">
                                <h2 class="slide_title">Выгодный чекап для щенков и котят</h2>
                                <p class="slide_desc">
                                    Комплексное обследование щенков (6800₽) и котят (5700₽) с
                                    консультациями терапевта, зоопсихолога, ортопеда
                                </p>
                                <button class="btn_podrobnee">Подробнее</button>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="slide_text">
                                <h2 class="slide_title">Бесплатный прием ортопеда после МРТ</h2>
                                <p class="slide_desc">
                                    Профессиональная чистка зубов ультразвуком и лечение кариеса у
                                    домашних животных от 3500₽
                                </p>
                                <button class="btn_podrobnee">Подробнее</button>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="slide_text">
                                <h2 class="slide_title">Вакцинация с выездом на дом</h2>
                                <p class="slide_desc">
                                    Наш врач приедет к вам домой и проведёт вакцинацию в
                                    комфортной для питомца обстановке от 2200₽
                                </p>
                                <button class="btn_podrobnee">Подробнее</button>
                            </div>
                        </div>
                    </div>

                    <!-- Right: nav buttons -->
                    <div class="slider_nav">
                        <button class="slider_btn prev_btn" id="prevBtn">
                            <</button>
                                <button class="slider_btn next_btn" id="nextBtn">></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Animal images — inside .banner, absolute bottom:0, overflow upward into top_banner -->
        <div class="slide_animal slide_animal_1 animal_active">
            <img src="{{ asset('assets/images/banner_slide1.png') }}" alt="Питомец" class="animal_img_real" />
        </div>
        <div class="slide_animal slide_animal_2">
            <img src="{{ asset('assets/images/banner_slide2.png') }}" alt="Питомец" class="animal_img_real" />
        </div>
        <div class="slide_animal slide_animal_3">
            <img src="{{ asset('assets/images/banner_slide3.png') }}" alt="Питомец" class="animal_img_real" />
        </div>
        <!-- end .banner -->

        <div class="about">
            <div class="about_inner">
                <!-- LEFT -->
                <div class="about_left">
                    <h2 class="about_title">О нас</h2>
                    <p class="about_text">
                        <span class="about_blue">Основанная в 2015 году</span> в
                        Санкт-Петербурге, наша ветклиника начала свой путь с небольшого
                        кабинета в спальном районе. Изначально задуманная как пункт
                        неотложной помощи, за девять лет она выросла в полноценный
                        лечебно-диагностический центр.
                    </p>
                    <p class="about_text">
                        <span class="about_blue">Что делает нас лучше остальных?</span> Во
                        первых, человечный подход к каждому хвосту. Мы не навязываем анализы
                        «для галочки», а объясняем каждый шаг на понятном языке, с фото и
                        схемами. Во-вторых, реальная круглосуточная поддержка — не
                        автоответчик, а живой врач на проводе до 3 часов ночи.
                    </p>
                </div>

                <!-- RIGHT -->
                <div class="about_right">
                    <!-- Blue background block 620x500 -->
                    <div class="about_blue_block"></div>
                    <!-- Photo 700x380, overlaps left ~70px, centered vertically on blue block -->
                    <img src="{{ asset('assets/images/about.png') }}" alt="О нас" class="about_img" />
                </div>
            </div>
        </div>

        <div class="service">
            <div class="service_inner">
                <h2 class="service_title">Наши услуги</h2>
                <div class="service_list">
                    <div class="service_item service_bg_white">
                        <div class="service_item_content">
                            <h3 class="service_item_title color_black">Первичный приём</h3>
                            <p class="service_item_desc">
                                Осмотр, консультация, постановка диагноза
                            </p>
                            <div class="item_action">
                                <p class="price color_blue">от 900 ₽</p>
                                <button class="service_btn btn_white">Записать питомца</button>
                            </div>
                        </div>
                    </div>

                    <div class="service_item service_bg_blue">
                        <div class="service_item_content">
                            <h3 class="service_item_title color_white">Вакцинация</h3>
                            <p class="service_item_desc color_white">
                                Комплексные вакцины, карта прививок
                            </p>
                            <div class="item_action">
                                <p class="price color_white">от 1200 ₽</p>
                                <button class="service_btn btn_blue">Записать питомца</button>
                            </div>
                        </div>
                    </div>

                    <div class="service_item service_bg_white">
                        <div class="service_item_content">
                            <h3 class="service_item_title color_black">
                                Лабораторная диагностика
                            </h3>
                            <p class="service_item_desc">Анализы крови, мочи, биохимия</p>
                            <div class="item_action">
                                <p class="price color_blue">от 500 ₽</p>
                                <button class="service_btn btn_white">Записать питомца</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TEAM SECTION -->
        <div class="team">
            <div class="team_inner">
                <!-- LEFT: sticky sidebar -->
                <div class="team_sidebar">
                    <div class="team_search_wrap">
                        <input type="text" class="team_search" id="doctorSearch" placeholder="Поиск по имени..." />
                    </div>
                    <ul class="team_departments" id="departmentList">
                        <li class="dept_item dept_active" data-dept="all">Все отделения</li>
                        @php
                            $departments = [
                                'Хирургия',
                                'Терапия',
                                'Диагностика',
                                'Неврология',
                                'Стоматология',
                                'Онкология',
                                'Дерматология',
                                'Офтальмология',
                                'Травматология',
                                'Кардиология',
                            ];
                        @endphp
                        @foreach ($departments as $dept)
                            <li class="dept_item" data-dept="{{ $dept }}">{{ $dept }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- RIGHT: doctor cards -->
                <div class="team_cards" id="doctorsContainer">
                    @forelse($doctors as $doctor)
                        <div class="doctor_card" data-doctor-name="{{ strtolower($doctor->name) }}"
                            data-doctor-department="{{ $doctor->department }}">
                            <img src="{{ getDoctorPhoto($doctor->photo) }}" alt="Врач" class="doctor_photo" />
                            <div class="doctor_info">
                                <p class="doctor_name">{{ $doctor->name }}</p>
                                <p class="doctor_role">
                                    {{ $doctor->specialization ?? ($doctor->position->name ?? 'Ветеринарный врач') }}
                                </p>
                                <div class="doctor_bottom">
                                    <span class="doctor_price">от {{ number_format($doctor->price, 0, '', ' ') }} ₽</span>
                                    <a href="#" class="doctor_book"
                                        data-doctor-id="{{ $doctor->id }}">Записаться</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="no-doctors" style="color: white; text-align: center; width: 100%; padding: 50px;">
                            Нет активных врачей в базе данных
                        </div>
                    @endforelse

                    <!-- 6th card: All doctors CTA (если врачей достаточно) -->
                    @if ($doctors->count() >= 5)
                        <div class="doctor_card doctor_card_all">
                            <span class="doctor_card_all_text">Все врачи отделения →</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- REVIEWS SECTION -->
        <div class="reviews">
            <div class="reviews_inner">
                <h2 class="reviews_title">Отзывы наших клиентов</h2>

                <!-- Variant 1: dark cards -->
                <div class="reviews_row">
                    <div class="review_card">
                        <div class="review_avatar_wrap">
                            <img src="{{ asset('assets/images/review_1.png') }}" alt="Аватар" class="review_avatar" />
                        </div>
                        <div class="review_body">
                            <p class="review_name">Анна Воронова</p>
                            <p class="review_text">
                                Отличная клиника! Наш кот попал в экстренную ситуацию ночью, и
                                врач приехал уже через 40 минут. Всё объяснил чётко, без лишних
                                анализов. Теперь ходим только сюда.
                            </p>
                        </div>
                    </div>

                    <div class="review_card">
                        <div class="review_avatar_wrap">
                            <img src="{{ asset('assets/images/review_3.png') }}" alt="Аватар" class="review_avatar" />
                        </div>
                        <div class="review_body">
                            <p class="review_name">Михаил Захаров</p>
                            <p class="review_text">
                                Сделали сложную операцию нашему лабрадору. Хирург объяснил
                                каждый этап, показал снимки, ответил на все вопросы.
                                Реабилитация прошла быстро. Спасибо огромное команде!
                            </p>
                        </div>
                    </div>

                    <div class="review_card">
                        <div class="review_avatar_wrap">
                            <img src="{{ asset('assets/images/review_2.png') }}" alt="Аватар" class="review_avatar" />
                        </div>
                        <div class="review_body">
                            <p class="review_name">Светлана Орлова</p>
                            <p class="review_text">
                                Очень внимательный персонал. Моя кошка всегда боялась
                                ветеринаров, а здесь её встретили так тепло, что она даже не
                                пищала. Запись онлайн — удобно и быстро.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CALL VET SECTION -->
        <div class="callvet_wrap">
            <div class="callvet">
                <div class="callvet_left">
                    <h2 class="callvet_title">Необходим вызов ветеринара на дом?</h2>
                    <p class="callvet_desc">
                        Оставьте заявку и мы свяжемся с вами в течении 5 минут
                    </p>
                    <div class="callvet_form">
                        <input type="text" class="callvet_input" placeholder="Ваше имя" />
                        <input type="tel" class="callvet_input" placeholder="+7 (___) ___-__-__" />
                        <button class="callvet_btn">Оставить заявку</button>
                    </div>
                </div>
                <div class="callvet_right">
                    <img src="{{ asset('assets/images/callvet.png') }}" alt="Ветеринар" class="callvet_img" />
                </div>
            </div>
        </div>

        <!-- ARTICLES SECTION -->
        <div class="articles">
            <div class="articles_inner">
                <h2 class="articles_title">Последние статьи</h2>
                <div class="articles_list">
                    <div class="article_card">
                        <div class="article_img_wrap">
                            <img src="{{ asset('assets/images/article_1.png') }}" alt="Статья" class="article_img" />
                        </div>
                        <div class="article_body">
                            <p class="article_date">12 мая 2025</p>
                            <p class="article_name">
                                Аллергия у собак: симптомы, диагностика и лечение
                            </p>
                            <span class="article_tag">Дерматология</span>
                        </div>
                    </div>

                    <div class="article_card">
                        <div class="article_img_wrap">
                            <img src="{{ asset('assets/images/article_2.png') }}" alt="Статья" class="article_img" />
                        </div>
                        <div class="article_body">
                            <p class="article_date">3 мая 2025</p>
                            <p class="article_name">
                                Как лечить отит у кошек и котов: полное руководство
                            </p>
                            <span class="article_tag">Дерматология</span>
                        </div>
                    </div>

                    <div class="article_card">
                        <div class="article_img_wrap">
                            <img src="{{ asset('assets/images/article_3.png') }}" alt="Статья" class="article_img" />
                        </div>
                        <div class="article_body">
                            <p class="article_date">24 апреля 2025</p>
                            <p class="article_name">
                                Зачем и как обрабатывать кошек от глистов
                            </p>
                            <span class="article_tag">Терапия</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
            // ==================== AUTH FUNCTIONS ====================
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
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.message || 'Ошибка входа');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(error.message || 'Произошла ошибка при входе');
                    });
            }

            // Функция для регистрации
            function submitRegister() {
                const password = document.getElementById('regPass').value;
                const passwordConfirm = document.getElementById('regPass2').value;

                if (password !== passwordConfirm) {
                    alert('Пароли не совпадают');
                    return;
                }

                const formData = {
                    name: document.querySelector('#regPanel input[placeholder="Иван Иванов"]').value,
                    email: document.querySelector('#regPanel input[placeholder="example@mail.ru"]').value,
                    password: password,
                    password_confirmation: passwordConfirm,
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
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.message || 'Ошибка регистрации');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(error.message || 'Произошла ошибка при регистрации');
                    });
            }

            // Привязываем функции к кнопкам
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
            // ==================== SLIDER FUNCTIONS ====================
            const slides = document.querySelectorAll(".slide");
            const animals = document.querySelectorAll(".slide_animal");
            let current = 0;

            function goTo(index) {
                if (!slides.length) return;
                slides[current].classList.remove("active");
                animals[current].classList.remove("animal_active");
                current = (index + slides.length) % slides.length;
                slides[current].classList.add("active");
                animals[current].classList.add("animal_active");
            }

            const nextBtn = document.getElementById("nextBtn");
            const prevBtn = document.getElementById("prevBtn");
            if (nextBtn) nextBtn.addEventListener("click", () => goTo(current + 1));
            if (prevBtn) prevBtn.addEventListener("click", () => goTo(current - 1));

            // ==================== DOCTORS FILTER ====================
            function filterDoctors() {
                const searchValue = document.getElementById('doctorSearch')?.value.toLowerCase().trim() || '';
                const activeDept = document.querySelector('.dept_item.dept_active')?.getAttribute('data-dept') || 'all';
                const doctors = document.querySelectorAll('.doctor_card:not(.doctor_card_all)');
                let visibleCount = 0;

                doctors.forEach(card => {
                    const doctorName = card.getAttribute('data-doctor-name') || '';
                    const doctorDept = card.getAttribute('data-doctor-department') || '';

                    const matchesSearch = searchValue === '' || doctorName.includes(searchValue);
                    const matchesDept = activeDept === 'all' || doctorDept === activeDept;

                    if (matchesSearch && matchesDept) {
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Показать/скрыть сообщение "Нет результатов"
                let noResultsMsg = document.getElementById('noResultsMsg');
                if (visibleCount === 0 && doctors.length > 0) {
                    if (!noResultsMsg) {
                        const container = document.getElementById('doctorsContainer');
                        const msg = document.createElement('div');
                        msg.id = 'noResultsMsg';
                        msg.style.cssText = 'color: white; text-align: center; width: 100%; padding: 50px; font-size: 18px;';
                        msg.innerText = 'По вашему запросу врачей не найдено';
                        container.appendChild(msg);
                    }
                } else if (noResultsMsg) {
                    noResultsMsg.remove();
                }
            }

            // Инициализация фильтров
            document.addEventListener('DOMContentLoaded', function() {
                // Поиск при вводе текста
                const searchInput = document.getElementById('doctorSearch');
                if (searchInput) {
                    searchInput.addEventListener('input', filterDoctors);
                }

                // Фильтр по отделениям
                const deptItems = document.querySelectorAll('.dept_item');
                deptItems.forEach(item => {
                    item.addEventListener('click', function() {
                        deptItems.forEach(i => i.classList.remove('dept_active'));
                        this.classList.add('dept_active');
                        filterDoctors();
                    });
                });

                // Запись к врачу
                document.querySelectorAll('.doctor_book').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const doctorId = this.getAttribute('data-doctor-id');
                        alert('Функция записи к врачу будет доступна в ближайшее время');
                    });
                });
            });
            // Добавьте этот код в конец файла main.blade.php (перед закрывающим тегом </body> или внутри существующего <script>)

            // ==================== БУРГЕР-МЕНЮ ====================
            (function() {
                // Проверяем, нужно ли добавлять бургер (ширина <= 380px)
                function checkWidthAndInitBurger() {
                    if (window.innerWidth <= 380 && !document.querySelector('.burger_btn')) {
                        initBurgerMenu();
                    } else if (window.innerWidth > 380) {
                        const burger = document.querySelector('.burger_btn');
                        const nav = document.querySelector('.header_nav');
                        if (burger) {
                            burger.remove();
                        }
                        if (nav && nav.classList.contains('active')) {
                            nav.classList.remove('active');
                            document.body.style.overflow = '';
                        }
                    }
                }

                function initBurgerMenu() {
                    // Если кнопка бургера уже есть, не создаём заново
                    if (document.querySelector('.burger_btn')) return;

                    const headerInner = document.querySelector('.inner_header');
                    const headerNav = document.querySelector('.header_nav');
                    const headerBtn = document.querySelector('.header_btn');

                    if (!headerInner || !headerNav) return;

                    // Создаём кнопку бургера
                    const burgerBtn = document.createElement('button');
                    burgerBtn.className = 'burger_btn';
                    burgerBtn.setAttribute('aria-label', 'Меню');
                    burgerBtn.innerHTML = '<span></span><span></span><span></span>';

                    // Вставляем бургер перед header_btn
                    if (headerBtn) {
                        headerInner.insertBefore(burgerBtn, headerBtn);
                    } else {
                        headerInner.appendChild(burgerBtn);
                    }

                    // Обработчик клика по бургеру
                    burgerBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        this.classList.toggle('active');
                        headerNav.classList.toggle('active');

                        if (headerNav.classList.contains('active')) {
                            document.body.style.overflow = 'hidden';
                        } else {
                            document.body.style.overflow = '';
                        }
                    });

                    // Закрытие меню при клике на ссылку
                    const navLinks = headerNav.querySelectorAll('a');
                    navLinks.forEach(link => {
                        link.addEventListener('click', () => {
                            burgerBtn.classList.remove('active');
                            headerNav.classList.remove('active');
                            document.body.style.overflow = '';
                        });
                    });

                    // Закрытие при клике вне меню
                    document.addEventListener('click', function(e) {
                        if (headerNav.classList.contains('active') &&
                            !headerNav.contains(e.target) &&
                            !burgerBtn.contains(e.target)) {
                            burgerBtn.classList.remove('active');
                            headerNav.classList.remove('active');
                            document.body.style.overflow = '';
                        }
                    });
                }

                // ==================== СЛАЙДЕР С ФОНОВЫМ ИЗОБРАЖЕНИЕМ ДЛЯ 380px ====================
                function adaptSliderForMobile() {
                    const botBanner = document.querySelector('.bot_banner');
                    const slides = document.querySelectorAll('.slide');
                    const animals = document.querySelectorAll('.slide_animal');

                    if (!botBanner || window.innerWidth > 380) {
                        // Если ширина больше 380px, убираем data-bg атрибуты
                        if (botBanner) botBanner.removeAttribute('data-bg');
                        return;
                    }

                    // Устанавливаем фоновое изображение для активного слайда
                    function updateMobileBackground() {
                        let activeIndex = 0;
                        slides.forEach((slide, idx) => {
                            if (slide.classList.contains('active')) {
                                activeIndex = idx;
                            }
                        });

                        // Ищем соответствующее изображение животного для этого слайда
                        let bgUrl = '';
                        if (animals[activeIndex]) {
                            const img = animals[activeIndex].querySelector('img');
                            if (img && img.src) {
                                bgUrl = img.src;
                            }
                        }

                        // Если изображение найдено, устанавливаем как фон
                        if (bgUrl) {
                            botBanner.style.backgroundImage = `url('${bgUrl}')`;
                            botBanner.style.backgroundSize = 'cover';
                            botBanner.style.backgroundPosition = 'center';
                            botBanner.style.backgroundRepeat = 'no-repeat';
                        }
                    }

                    // Переопределяем функцию goTo, чтобы обновлять фон
                    if (typeof window.originalGoTo === 'undefined' && typeof window.goTo !== 'undefined') {
                        window.originalGoTo = window.goTo;
                        window.goTo = function(index) {
                            if (window.originalGoTo) window.originalGoTo(index);
                            updateMobileBackground();
                        };
                    }

                    // Первоначальное обновление фона
                    updateMobileBackground();

                    // Наблюдаем за изменениями слайдов (на случай, если слайдер переключается другим способом)
                    const observer = new MutationObserver(() => updateMobileBackground());
                    const sliderTrack = document.querySelector('.slider_track');
                    if (sliderTrack) {
                        observer.observe(sliderTrack, {
                            attributes: true,
                            childList: true,
                            subtree: true
                        });
                    }
                }

                // Запускаем при загрузке и изменении размера окна
                window.addEventListener('load', function() {
                    checkWidthAndInitBurger();
                    adaptSliderForMobile();
                });

                window.addEventListener('resize', function() {
                    checkWidthAndInitBurger();
                    adaptSliderForMobile();
                });
            })();
            // ==================== ГОРИЗОНТАЛЬНЫЙ СЛАЙДЕР ВРАЧЕЙ (ЗАЖАТИЕМ ЛКМ) ====================
            (function() {
                let scrollContainer = null;
                let isDragging = false;
                let startX = 0;
                let startScrollLeft = 0;
                let hasMoved = false;

                function initHorizontalDoctorSlider() {
                    // Только для экранов 380px и меньше
                    if (window.innerWidth > 380) {
                        // Если был слайдер, убираем обработчики
                        if (scrollContainer) {
                            removeDragListeners();
                            scrollContainer = null;
                        }
                        // Убираем индикатор прокрутки
                        const hint = document.querySelector('.scroll_hint');
                        if (hint) hint.remove();
                        return;
                    }

                    const container = document.getElementById('doctorsContainer');
                    if (!container) return;

                    // Если уже инициализирован, не пересоздаём
                    if (scrollContainer === container) return;

                    scrollContainer = container;

                    // Добавляем обёртку для градиентов (опционально)
                    if (!container.parentElement.classList.contains('team_cards_container')) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'team_cards_container';
                        container.parentNode.insertBefore(wrapper, container);
                        wrapper.appendChild(container);
                    }

                    // Убеждаемся, что стили применены
                    container.style.display = 'flex';
                    container.style.flexWrap = 'nowrap';
                    container.style.overflowX = 'auto';
                    container.style.cursor = 'grab';
                    container.style.userSelect = 'none';

                    // Добавляем индикатор прокрутки
                    addScrollHint();

                    // Добавляем обработчики для перетаскивания
                    addDragListeners();

                    // Проверяем, нужно ли показать индикатор (если есть переполнение)
                    setTimeout(() => {
                        checkAndShowHint();
                    }, 100);
                }

                function addDragListeners() {
                    if (!scrollContainer) return;

                    // Mouse events
                    scrollContainer.addEventListener('mousedown', onMouseDown);
                    scrollContainer.addEventListener('mouseleave', onMouseUp);
                    scrollContainer.addEventListener('mouseup', onMouseUp);
                    scrollContainer.addEventListener('mousemove', onMouseMove);

                    // Touch events для мобильных устройств
                    scrollContainer.addEventListener('touchstart', onTouchStart);
                    scrollContainer.addEventListener('touchend', onTouchEnd);
                    scrollContainer.addEventListener('touchmove', onTouchMove);
                }

                function removeDragListeners() {
                    if (!scrollContainer) return;

                    scrollContainer.removeEventListener('mousedown', onMouseDown);
                    scrollContainer.removeEventListener('mouseleave', onMouseUp);
                    scrollContainer.removeEventListener('mouseup', onMouseUp);
                    scrollContainer.removeEventListener('mousemove', onMouseMove);

                    scrollContainer.removeEventListener('touchstart', onTouchStart);
                    scrollContainer.removeEventListener('touchend', onTouchEnd);
                    scrollContainer.removeEventListener('touchmove', onTouchMove);

                    // Убираем класс dragging
                    scrollContainer.classList.remove('dragging');
                    scrollContainer.style.cursor = 'grab';
                }

                function onMouseDown(e) {
                    if (!scrollContainer) return;
                    e.preventDefault();
                    isDragging = true;
                    hasMoved = false;
                    startX = e.pageX - scrollContainer.offsetLeft;
                    startScrollLeft = scrollContainer.scrollLeft;
                    scrollContainer.classList.add('dragging');
                    scrollContainer.style.cursor = 'grabbing';
                }

                function onMouseUp() {
                    if (!scrollContainer) return;
                    isDragging = false;
                    scrollContainer.classList.remove('dragging');
                    scrollContainer.style.cursor = 'grab';

                    // Если не было движения, значит это клик - не мешаем обычным ссылкам
                    if (!hasMoved) {
                        // Не блокируем клики
                    }
                }

                function onMouseMove(e) {
                    if (!isDragging || !scrollContainer) return;
                    e.preventDefault();
                    hasMoved = true;
                    const x = e.pageX - scrollContainer.offsetLeft;
                    const walk = (x - startX) * 1.5; // Скорость прокрутки
                    scrollContainer.scrollLeft = startScrollLeft - walk;
                }

                function onTouchStart(e) {
                    if (!scrollContainer) return;
                    const touch = e.touches[0];
                    isDragging = true;
                    hasMoved = false;
                    startX = touch.pageX - scrollContainer.offsetLeft;
                    startScrollLeft = scrollContainer.scrollLeft;
                }

                function onTouchEnd() {
                    isDragging = false;
                    hasMoved = false;
                }

                function onTouchMove(e) {
                    if (!isDragging || !scrollContainer) return;
                    const touch = e.touches[0];
                    const x = touch.pageX - scrollContainer.offsetLeft;
                    const walk = (x - startX) * 1.5;
                    scrollContainer.scrollLeft = startScrollLeft - walk;
                    hasMoved = true;
                }

                function addScrollHint() {
                    // Удаляем старый индикатор
                    const oldHint = document.querySelector('.scroll_hint');
                    if (oldHint) oldHint.remove();

                    // Проверяем, есть ли контейнер
                    if (!scrollContainer) return;

                    // Создаём индикатор
                    const hint = document.createElement('div');
                    hint.className = 'scroll_hint';
                    hint.innerHTML = ``;

                    // Вставляем после контейнера
                    const wrapper = scrollContainer.parentElement;
                    if (wrapper && !wrapper.querySelector('.scroll_hint')) {
                        wrapper.insertBefore(hint, scrollContainer.nextSibling);
                    }

                    // Автоматически скрыть через 4 секунды
                    setTimeout(() => {
                        if (hint && hint.parentNode) {
                            hint.style.transition = 'opacity 0.5s';
                            hint.style.opacity = '0';
                            setTimeout(() => {
                                if (hint && hint.parentNode) hint.remove();
                            }, 500);
                        }
                    }, 4000);
                }

                function checkAndShowHint() {
                    if (!scrollContainer) return;
                    // Проверяем, есть ли переполнение (нужна ли прокрутка)
                    const needsScroll = scrollContainer.scrollWidth > scrollContainer.clientWidth;
                    if (needsScroll && !document.querySelector('.scroll_hint')) {
                        addScrollHint();
                    }
                }

                // Переопределяем filterDoctors, чтобы после фильтрации обновить слайдер
                const originalFilterDoctors = window.filterDoctors;
                if (originalFilterDoctors) {
                    window.filterDoctors = function() {
                        originalFilterDoctors();
                        // После фильтрации обновляем слайдер
                        setTimeout(() => {
                            if (window.innerWidth <= 380 && scrollContainer) {
                                checkAndShowHint();
                            }
                        }, 100);
                    };
                }

                // Наблюдаем за изменениями в контейнере (добавление/удаление карточек)
                function observeContainerChanges() {
                    if (!scrollContainer) return;

                    const observer = new MutationObserver(() => {
                        if (window.innerWidth <= 380) {
                            setTimeout(() => {
                                if (scrollContainer) {
                                    checkAndShowHint();
                                }
                            }, 100);
                        }
                    });

                    observer.observe(scrollContainer, {
                        childList: true,
                        subtree: false
                    });
                }

                // Запускаем при загрузке
                document.addEventListener('DOMContentLoaded', function() {
                    initHorizontalDoctorSlider();
                    observeContainerChanges();
                });

                // Слушаем изменение размера окна
                let resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        initHorizontalDoctorSlider();
                    }, 200);
                });

                // Перезапускаем после фильтрации (если кнопки фильтров были нажаты)
                const deptItems = document.querySelectorAll('.dept_item');
                deptItems.forEach(item => {
                    item.addEventListener('click', function() {
                        setTimeout(() => {
                            if (window.innerWidth <= 380 && scrollContainer) {
                                checkAndShowHint();
                            }
                        }, 150);
                    });
                });
            })();
            // ==================== ГОРИЗОНТАЛЬНЫЙ СЛАЙДЕР ОТЗЫВОВ (ЗАЖАТИЕМ ЛКМ) ====================
            (function() {
                let reviewsScrollContainer = null;
                let isReviewsDragging = false;
                let reviewsStartX = 0;
                let reviewsStartScrollLeft = 0;
                let reviewsHasMoved = false;

                function initHorizontalReviewsSlider() {
                    // Только для экранов 380px и меньше
                    if (window.innerWidth > 380) {
                        // Если был слайдер, убираем обработчики
                        if (reviewsScrollContainer) {
                            removeReviewsDragListeners();
                            reviewsScrollContainer = null;
                        }
                        // Убираем индикатор прокрутки
                        const hint = document.querySelector('.reviews_scroll_hint');
                        if (hint) hint.remove();
                        return;
                    }

                    const container = document.querySelector('.reviews_row');
                    if (!container) return;

                    // Если уже инициализирован, не пересоздаём
                    if (reviewsScrollContainer === container) return;

                    reviewsScrollContainer = container;

                    // Добавляем обёртку для градиентов (опционально)
                    const parent = container.parentElement;
                    if (parent && !parent.classList.contains('reviews_container')) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'reviews_container';
                        parent.insertBefore(wrapper, container);
                        wrapper.appendChild(container);
                    }

                    // Убеждаемся, что стили применены
                    container.style.display = 'flex';
                    container.style.flexWrap = 'nowrap';
                    container.style.overflowX = 'auto';
                    container.style.cursor = 'grab';
                    container.style.userSelect = 'none';
                    container.style.justifyContent = 'flex-start';

                    // Добавляем индикатор прокрутки
                    addReviewsScrollHint();

                    // Добавляем обработчики для перетаскивания
                    addReviewsDragListeners();

                    // Проверяем, нужно ли показать индикатор (если есть переполнение)
                    setTimeout(() => {
                        checkAndShowReviewsHint();
                    }, 100);
                }

                function addReviewsDragListeners() {
                    if (!reviewsScrollContainer) return;

                    // Mouse events
                    reviewsScrollContainer.addEventListener('mousedown', onReviewsMouseDown);
                    reviewsScrollContainer.addEventListener('mouseleave', onReviewsMouseUp);
                    reviewsScrollContainer.addEventListener('mouseup', onReviewsMouseUp);
                    reviewsScrollContainer.addEventListener('mousemove', onReviewsMouseMove);

                    // Touch events для мобильных устройств
                    reviewsScrollContainer.addEventListener('touchstart', onReviewsTouchStart);
                    reviewsScrollContainer.addEventListener('touchend', onReviewsTouchEnd);
                    reviewsScrollContainer.addEventListener('touchmove', onReviewsTouchMove);
                }

                function removeReviewsDragListeners() {
                    if (!reviewsScrollContainer) return;

                    reviewsScrollContainer.removeEventListener('mousedown', onReviewsMouseDown);
                    reviewsScrollContainer.removeEventListener('mouseleave', onReviewsMouseUp);
                    reviewsScrollContainer.removeEventListener('mouseup', onReviewsMouseUp);
                    reviewsScrollContainer.removeEventListener('mousemove', onReviewsMouseMove);

                    reviewsScrollContainer.removeEventListener('touchstart', onReviewsTouchStart);
                    reviewsScrollContainer.removeEventListener('touchend', onReviewsTouchEnd);
                    reviewsScrollContainer.removeEventListener('touchmove', onReviewsTouchMove);

                    // Убираем класс dragging
                    reviewsScrollContainer.classList.remove('dragging');
                    reviewsScrollContainer.style.cursor = 'grab';
                }

                function onReviewsMouseDown(e) {
                    if (!reviewsScrollContainer) return;
                    e.preventDefault();
                    isReviewsDragging = true;
                    reviewsHasMoved = false;
                    reviewsStartX = e.pageX - reviewsScrollContainer.offsetLeft;
                    reviewsStartScrollLeft = reviewsScrollContainer.scrollLeft;
                    reviewsScrollContainer.classList.add('dragging');
                    reviewsScrollContainer.style.cursor = 'grabbing';
                }

                function onReviewsMouseUp() {
                    if (!reviewsScrollContainer) return;
                    isReviewsDragging = false;
                    reviewsScrollContainer.classList.remove('dragging');
                    reviewsScrollContainer.style.cursor = 'grab';
                }

                function onReviewsMouseMove(e) {
                    if (!isReviewsDragging || !reviewsScrollContainer) return;
                    e.preventDefault();
                    reviewsHasMoved = true;
                    const x = e.pageX - reviewsScrollContainer.offsetLeft;
                    const walk = (x - reviewsStartX) * 1.5;
                    reviewsScrollContainer.scrollLeft = reviewsStartScrollLeft - walk;
                }

                function onReviewsTouchStart(e) {
                    if (!reviewsScrollContainer) return;
                    const touch = e.touches[0];
                    isReviewsDragging = true;
                    reviewsHasMoved = false;
                    reviewsStartX = touch.pageX - reviewsScrollContainer.offsetLeft;
                    reviewsStartScrollLeft = reviewsScrollContainer.scrollLeft;
                }

                function onReviewsTouchEnd() {
                    isReviewsDragging = false;
                    reviewsHasMoved = false;
                }

                function onReviewsTouchMove(e) {
                    if (!isReviewsDragging || !reviewsScrollContainer) return;
                    const touch = e.touches[0];
                    const x = touch.pageX - reviewsScrollContainer.offsetLeft;
                    const walk = (x - reviewsStartX) * 1.5;
                    reviewsScrollContainer.scrollLeft = reviewsStartScrollLeft - walk;
                    reviewsHasMoved = true;
                }

                function addReviewsScrollHint() {
                    // Удаляем старый индикатор
                    const oldHint = document.querySelector('.reviews_scroll_hint');
                    if (oldHint) oldHint.remove();

                    // Проверяем, есть ли контейнер
                    if (!reviewsScrollContainer) return;

                    // Проверяем, нужно ли показывать индикатор (есть ли переполнение)
                    const needsScroll = reviewsScrollContainer.scrollWidth > reviewsScrollContainer.clientWidth;
                    if (!needsScroll) return;

                    // Создаём индикатор
                    const hint = document.createElement('div');
                    hint.className = 'reviews_scroll_hint';
                    hint.innerHTML = ``;

                    // Вставляем после контейнера
                    const wrapper = reviewsScrollContainer.parentElement;
                    if (wrapper && !wrapper.querySelector('.reviews_scroll_hint')) {
                        wrapper.insertBefore(hint, reviewsScrollContainer.nextSibling);
                    }

                    // Автоматически скрыть через 4 секунды
                    setTimeout(() => {
                        if (hint && hint.parentNode) {
                            hint.style.transition = 'opacity 0.5s';
                            hint.style.opacity = '0';
                            setTimeout(() => {
                                if (hint && hint.parentNode) hint.remove();
                            }, 500);
                        }
                    }, 4000);
                }

                function checkAndShowReviewsHint() {
                    if (!reviewsScrollContainer) return;
                    // Проверяем, есть ли переполнение (нужна ли прокрутка)
                    const needsScroll = reviewsScrollContainer.scrollWidth > reviewsScrollContainer.clientWidth;
                    if (needsScroll && !document.querySelector('.reviews_scroll_hint')) {
                        addReviewsScrollHint();
                    }
                }

                // Наблюдаем за изменениями в контейнере (на случай динамической загрузки отзывов)
                function observeReviewsContainerChanges() {
                    if (!reviewsScrollContainer) return;

                    const observer = new MutationObserver(() => {
                        if (window.innerWidth <= 380) {
                            setTimeout(() => {
                                if (reviewsScrollContainer) {
                                    checkAndShowReviewsHint();
                                }
                            }, 100);
                        }
                    });

                    observer.observe(reviewsScrollContainer, {
                        childList: true,
                        subtree: false
                    });
                }

                // Запускаем при загрузке
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(() => {
                        initHorizontalReviewsSlider();
                        observeReviewsContainerChanges();
                    }, 100);
                });

                // Слушаем изменение размера окна
                let reviewsResizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(reviewsResizeTimer);
                    reviewsResizeTimer = setTimeout(() => {
                        initHorizontalReviewsSlider();
                    }, 200);
                });
            })();
            // ==================== ГОРИЗОНТАЛЬНЫЙ СЛАЙДЕР СТАТЕЙ (ЗАЖАТИЕМ ЛКМ) ====================
            (function() {
                let articlesScrollContainer = null;
                let isArticlesDragging = false;
                let articlesStartX = 0;
                let articlesStartScrollLeft = 0;
                let articlesHasMoved = false;

                function initHorizontalArticlesSlider() {
                    // Только для экранов 380px и меньше
                    if (window.innerWidth > 380) {
                        // Если был слайдер, убираем обработчики
                        if (articlesScrollContainer) {
                            removeArticlesDragListeners();
                            articlesScrollContainer = null;
                        }
                        // Убираем индикатор прокрутки
                        const hint = document.querySelector('.articles_scroll_hint');
                        if (hint) hint.remove();
                        return;
                    }

                    const container = document.querySelector('.articles_list');
                    if (!container) return;

                    // Если уже инициализирован, не пересоздаём
                    if (articlesScrollContainer === container) return;

                    articlesScrollContainer = container;

                    // Добавляем обёртку для градиентов (опционально)
                    const parent = container.parentElement;
                    if (parent && !parent.classList.contains('articles_container')) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'articles_container';
                        parent.insertBefore(wrapper, container);
                        wrapper.appendChild(container);
                    }

                    // Убеждаемся, что стили применены
                    container.style.display = 'flex';
                    container.style.flexWrap = 'nowrap';
                    container.style.overflowX = 'auto';
                    container.style.cursor = 'grab';
                    container.style.userSelect = 'none';
                    container.style.justifyContent = 'flex-start';

                    // Добавляем индикатор прокрутки
                    addArticlesScrollHint();

                    // Добавляем обработчики для перетаскивания
                    addArticlesDragListeners();

                    // Проверяем, нужно ли показать индикатор (если есть переполнение)
                    setTimeout(() => {
                        checkAndShowArticlesHint();
                    }, 100);
                }

                function addArticlesDragListeners() {
                    if (!articlesScrollContainer) return;

                    // Mouse events
                    articlesScrollContainer.addEventListener('mousedown', onArticlesMouseDown);
                    articlesScrollContainer.addEventListener('mouseleave', onArticlesMouseUp);
                    articlesScrollContainer.addEventListener('mouseup', onArticlesMouseUp);
                    articlesScrollContainer.addEventListener('mousemove', onArticlesMouseMove);

                    // Touch events для мобильных устройств
                    articlesScrollContainer.addEventListener('touchstart', onArticlesTouchStart);
                    articlesScrollContainer.addEventListener('touchend', onArticlesTouchEnd);
                    articlesScrollContainer.addEventListener('touchmove', onArticlesTouchMove);
                }

                function removeArticlesDragListeners() {
                    if (!articlesScrollContainer) return;

                    articlesScrollContainer.removeEventListener('mousedown', onArticlesMouseDown);
                    articlesScrollContainer.removeEventListener('mouseleave', onArticlesMouseUp);
                    articlesScrollContainer.removeEventListener('mouseup', onArticlesMouseUp);
                    articlesScrollContainer.removeEventListener('mousemove', onArticlesMouseMove);

                    articlesScrollContainer.removeEventListener('touchstart', onArticlesTouchStart);
                    articlesScrollContainer.removeEventListener('touchend', onArticlesTouchEnd);
                    articlesScrollContainer.removeEventListener('touchmove', onArticlesTouchMove);

                    // Убираем класс dragging
                    articlesScrollContainer.classList.remove('dragging');
                    articlesScrollContainer.style.cursor = 'grab';
                }

                function onArticlesMouseDown(e) {
                    if (!articlesScrollContainer) return;
                    e.preventDefault();
                    isArticlesDragging = true;
                    articlesHasMoved = false;
                    articlesStartX = e.pageX - articlesScrollContainer.offsetLeft;
                    articlesStartScrollLeft = articlesScrollContainer.scrollLeft;
                    articlesScrollContainer.classList.add('dragging');
                    articlesScrollContainer.style.cursor = 'grabbing';
                }

                function onArticlesMouseUp() {
                    if (!articlesScrollContainer) return;
                    isArticlesDragging = false;
                    articlesScrollContainer.classList.remove('dragging');
                    articlesScrollContainer.style.cursor = 'grab';
                }

                function onArticlesMouseMove(e) {
                    if (!isArticlesDragging || !articlesScrollContainer) return;
                    e.preventDefault();
                    articlesHasMoved = true;
                    const x = e.pageX - articlesScrollContainer.offsetLeft;
                    const walk = (x - articlesStartX) * 1.5;
                    articlesScrollContainer.scrollLeft = articlesStartScrollLeft - walk;
                }

                function onArticlesTouchStart(e) {
                    if (!articlesScrollContainer) return;
                    const touch = e.touches[0];
                    isArticlesDragging = true;
                    articlesHasMoved = false;
                    articlesStartX = touch.pageX - articlesScrollContainer.offsetLeft;
                    articlesStartScrollLeft = articlesScrollContainer.scrollLeft;
                }

                function onArticlesTouchEnd() {
                    isArticlesDragging = false;
                    articlesHasMoved = false;
                }

                function onArticlesTouchMove(e) {
                    if (!isArticlesDragging || !articlesScrollContainer) return;
                    const touch = e.touches[0];
                    const x = touch.pageX - articlesScrollContainer.offsetLeft;
                    const walk = (x - articlesStartX) * 1.5;
                    articlesScrollContainer.scrollLeft = articlesStartScrollLeft - walk;
                    articlesHasMoved = true;
                }

                function addArticlesScrollHint() {
                    // Удаляем старый индикатор
                    const oldHint = document.querySelector('.articles_scroll_hint');
                    if (oldHint) oldHint.remove();

                    // Проверяем, есть ли контейнер
                    if (!articlesScrollContainer) return;

                    // Проверяем, нужно ли показывать индикатор (есть ли переполнение)
                    const needsScroll = articlesScrollContainer.scrollWidth > articlesScrollContainer.clientWidth;
                    if (!needsScroll) return;

                    // Создаём индикатор
                    const hint = document.createElement('div');
                    hint.className = 'articles_scroll_hint';
                    hint.innerHTML = ``;

                    // Вставляем после контейнера
                    const wrapper = articlesScrollContainer.parentElement;
                    if (wrapper && !wrapper.querySelector('.articles_scroll_hint')) {
                        wrapper.insertBefore(hint, articlesScrollContainer.nextSibling);
                    }

                    // Автоматически скрыть через 4 секунды
                    setTimeout(() => {
                        if (hint && hint.parentNode) {
                            hint.style.transition = 'opacity 0.5s';
                            hint.style.opacity = '0';
                            setTimeout(() => {
                                if (hint && hint.parentNode) hint.remove();
                            }, 500);
                        }
                    }, 4000);
                }

                function checkAndShowArticlesHint() {
                    if (!articlesScrollContainer) return;
                    // Проверяем, есть ли переполнение (нужна ли прокрутка)
                    const needsScroll = articlesScrollContainer.scrollWidth > articlesScrollContainer.clientWidth;
                    if (needsScroll && !document.querySelector('.articles_scroll_hint')) {
                        addArticlesScrollHint();
                    }
                }

                // Наблюдаем за изменениями в контейнере (на случай динамической загрузки статей)
                function observeArticlesContainerChanges() {
                    if (!articlesScrollContainer) return;

                    const observer = new MutationObserver(() => {
                        if (window.innerWidth <= 380) {
                            setTimeout(() => {
                                if (articlesScrollContainer) {
                                    checkAndShowArticlesHint();
                                }
                            }, 100);
                        }
                    });

                    observer.observe(articlesScrollContainer, {
                        childList: true,
                        subtree: false
                    });
                }

                // Запускаем при загрузке
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(() => {
                        initHorizontalArticlesSlider();
                        observeArticlesContainerChanges();
                    }, 100);
                });

                // Слушаем изменение размера окна
                let articlesResizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(articlesResizeTimer);
                    articlesResizeTimer = setTimeout(() => {
                        initHorizontalArticlesSlider();
                    }, 200);
                });
            })();
        </script>
    </body>

    </html>
@endsection

<?php
// Вспомогательная функция для получения пути к фото врача
function getDoctorPhoto($photo)
{
    if (!$photo) {
        return asset('assets/images/doctor_default.png');
    }

    // Если фото уже полный URL
    if (filter_var($photo, FILTER_VALIDATE_URL)) {
        return $photo;
    }

    // Проверяем наличие фото в storage (если путь начинается с doctors/)
    if (str_starts_with($photo, 'doctors/')) {
        $storagePath = public_path('storage/' . $photo);
        if (file_exists($storagePath)) {
            return asset('storage/' . $photo);
        }
    }

    // Проверяем наличие фото в public/assets/images
    $publicPath = public_path('assets/images/' . $photo);
    if (file_exists($publicPath)) {
        return asset('assets/images/' . $photo);
    }

    // Если фото имеет формат doctor_1.png и т.д.
    if (preg_match('/doctor_\d+\.(png|jpg|jpeg|webp)/i', $photo)) {
        return asset('assets/images/' . $photo);
    }

    // Возвращаем изображение по умолчанию
    return asset('assets/images/doctor_default.png');
}
?>
