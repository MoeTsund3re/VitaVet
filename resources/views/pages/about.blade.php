@extends('layouts.app')


@section('content')

    <body>
        <div class="about_banner">
            <div class="about_banner_inner">
                <div class="about_banner_text">
                    <div class="about_banner_sup">Ветеринарная клиника</div>
                    <h1 class="about_banner_title">
                        Мы заботимся о тех, кто не умеет говорить
                    </h1>
                    <p class="about_banner_desc">
                        Более 10 лет мы помогаем питомцам оставаться здоровыми. Опытные
                        врачи, современное оборудование и искренняя любовь к животным — наши
                        главные инструменты.
                    </p>
                </div>
                <div class="about_banner_right">
                    <img src="assets/images/promotion/promo5.jpg" alt="" />
                </div>
            </div>
        </div>

        <!-- PAGE BODY -->
        <div class="about_page">
            <!-- PRINCIPLES -->
            <div class="principles_section">
                <div class="section_label">Наши принципы</div>
                <div class="section_title">То, что нами движет</div>
                <div class="principles_grid">
                    <div class="principle_card pc_blue">
                        <div class="principle_icon pi_blue">🤍</div>
                        <div class="principle_name">Забота</div>
                        <p class="principle_text">
                            Мы внимательны к животным и людям и искренне хотим помочь. Мы
                            считаем, что лечение должно проходить без лишнего стресса и
                            создаём условия для того, чтобы всем было комфортно.
                        </p>
                    </div>

                    <div class="principle_card pc_green">
                        <div class="principle_icon pi_green">⚖️</div>
                        <div class="principle_name">Ответственность</div>
                        <p class="principle_text">
                            Мы принимаем взвешенные решения, учитывая потребности наших
                            пациентов. Мы готовы к сложным ситуациям и нестандартным
                            медицинским случаям. Мы отвечаем за каждую процедуру и
                            рекомендацию.
                        </p>
                    </div>

                    <div class="principle_card pc_yellow">
                        <div class="principle_icon pi_yellow">🎯</div>
                        <div class="principle_name">Профессионализм</div>
                        <p class="principle_text">
                            Наши сотрудники досконально знают своё дело, увлечены профессией и
                            постоянно совершенствуются в ней. Мы следим за новейшими
                            методиками и применяем их в работе.
                        </p>
                    </div>
                </div>
            </div>

            <!-- STATS -->
            <div class="stats_section">
                <div class="stats_grid">
                    <div class="stat_item">
                        <div class="stat_number">
                            <span class="stat_count" data-target="1000">0</span>
                            <span class="stat_suffix">+</span>
                        </div>
                        <div class="stat_label">клиентов в неделю</div>
                    </div>
                    <div class="stat_item">
                        <div class="stat_number">
                            <span class="stat_count" data-target="25000">0</span>
                            <span class="stat_suffix">+</span>
                        </div>
                        <div class="stat_label">вылеченных животных</div>
                    </div>
                    <div class="stat_item">
                        <div class="stat_number">
                            <span class="stat_count" data-target="47">0</span>
                            <span class="stat_suffix"></span>
                        </div>
                        <div class="stat_label">врачей и специалистов в штате</div>
                    </div>
                    <div class="stat_item">
                        <div class="stat_number">
                            <span class="stat_count" data-target="10">0</span>
                            <span class="stat_suffix">лет</span>
                        </div>
                        <div class="stat_label">опыта и профессионализма</div>
                    </div>
                </div>
            </div>

            <!-- HISTORY -->
            <div class="history_section">
                <div class="history_left">
                    <div class="section_label">Наша история</div>
                    <div class="section_title">Как всё начиналось</div>
                    <div class="history_text">
                        <p>
                            Клиника была основана в 2014 году группой ветеринарных врачей,
                            объединённых общей идеей — создать место, где каждый питомец
                            получает лечение как в лучших клиниках мира.
                        </p>
                        <p>
                            Начав с небольшого кабинета на три специализации, сегодня мы
                            располагаем современным многопрофильным центром с собственной
                            лабораторией, операционными и отделением интенсивной терапии.
                        </p>
                        <p>
                            Мы открыты круглосуточно, потому что болезни не ждут — и наши
                            врачи всегда готовы прийти на помощь.
                        </p>
                    </div>
                </div>
                <div class="history_right">
                    <div class="history_card">
                        <div class="history_card_year">2014</div>
                        <div class="history_card_text">
                            Открытие клиники. Три специализации, пять врачей.
                        </div>
                    </div>
                    <div class="history_card">
                        <div class="history_card_year">2017</div>
                        <div class="history_card_text">
                            Расширение. Открыты хирургическое и кардиологическое отделения.
                        </div>
                    </div>
                    <div class="history_card">
                        <div class="history_card_year">2020</div>
                        <div class="history_card_text">
                            Переезд в новое здание. Запуск собственной МРТ-лаборатории.
                        </div>
                    </div>
                    <div class="history_card">
                        <div class="history_card_year">2024</div>
                        <div class="history_card_text">
                            10 лет. 47 врачей, 10 отделений, работа 24/7.
                        </div>
                    </div>
                </div>
            </div>

            <!-- DOCUMENTS -->
            <div class="docs_section">
                <div class="section_label">Документы</div>
                <div class="section_title">Лицензии и сертификаты</div>
                <div class="docs_grid">
                    <div class="doc_card">
                        <div class="doc_icon">
                            <div class="doc_icon_body doc_icon_pdf">
                                <span class="doc_ext">PDF</span>
                            </div>
                        </div>
                        <div class="doc_name">Лицензия на ветеринарную деятельность</div>
                        <div class="doc_meta">Выдана 15 марта 2014 · 2.3 МБ</div>
                        <a href="#" class="doc_download">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" y1="15" x2="12" y2="3" />
                            </svg>
                            Скачать
                        </a>
                    </div>

                    <div class="doc_card">
                        <div class="doc_icon">
                            <div class="doc_icon_body doc_icon_pdf">
                                <span class="doc_ext">PDF</span>
                            </div>
                        </div>
                        <div class="doc_name">
                            Свидетельство о регистрации юридического лица
                        </div>
                        <div class="doc_meta">Выдано 10 января 2014 · 1.1 МБ</div>
                        <a href="#" class="doc_download">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" y1="15" x2="12" y2="3" />
                            </svg>
                            Скачать
                        </a>
                    </div>

                    <div class="doc_card">
                        <div class="doc_icon">
                            <div class="doc_icon_body doc_icon_docx">
                                <span class="doc_ext">DOC</span>
                            </div>
                        </div>
                        <div class="doc_name">Сертификат соответствия оборудования</div>
                        <div class="doc_meta">Действителен до 2026 · 0.8 МБ</div>
                        <a href="#" class="doc_download">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" y1="15" x2="12" y2="3" />
                            </svg>
                            Скачать
                        </a>
                    </div>

                    <div class="doc_card">
                        <div class="doc_icon">
                            <div class="doc_icon_body doc_icon_img">
                                <span class="doc_ext">PNG</span>
                            </div>
                        </div>
                        <div class="doc_name">Аккредитация ветеринарной лаборатории</div>
                        <div class="doc_meta">Выдана в 2022 · 3.7 МБ</div>
                        <a href="#" class="doc_download">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" y1="15" x2="12" y2="3" />
                            </svg>
                            Скачать
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /about_page -->

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

            // ── Scroll-reveal for principle cards ──
            const revealObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("revealed");
                        }
                    });
                }, {
                    threshold: 0.15
                },
            );

            document.querySelectorAll(".principle_card, .stat_item").forEach((el) => {
                revealObserver.observe(el);
            });

            // ── Counter animation ──
            function animateCount(el, target, duration = 1800) {
                const start = performance.now();
                const isLarge = target >= 1000;

                function easeOut(t) {
                    return 1 - Math.pow(1 - t, 3);
                }

                function tick(now) {
                    const elapsed = now - start;
                    const progress = Math.min(elapsed / duration, 1);
                    const value = Math.round(easeOut(progress) * target);

                    if (isLarge) {
                        el.textContent =
                            value >= 1000 ?
                            (value / 1000).toFixed(value % 1000 === 0 ? 0 : 1) + " 000" :
                            value.toString();
                    } else {
                        el.textContent = value;
                    }

                    if (progress < 1) requestAnimationFrame(tick);
                    else el.textContent = formatNum(target);
                }
                requestAnimationFrame(tick);
            }

            function formatNum(n) {
                if (n >= 1000) return (n / 1000).toFixed(0) + " 000";
                return n.toString();
            }

            const statsObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const counters = entry.target.querySelectorAll(".stat_count");
                            counters.forEach((c) => {
                                const target = parseInt(c.dataset.target, 10);
                                animateCount(c, target);
                            });
                            statsObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.3
                },
            );

            const statsSection = document.querySelector(".stats_section");
            if (statsSection) statsObserver.observe(statsSection);
        </script>
    </body>
@endsection
