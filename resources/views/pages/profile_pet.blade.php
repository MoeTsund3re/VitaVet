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
            cursor: pointer;
            text-decoration: none;
        }

        .pet_card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .pet_emoji {
            font-size: 48px;
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

        .pets_grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Анимация загрузки */
        .loading {
            text-align: center;
            padding: 40px;
            color: rgba(255, 255, 255, 0.5);
        }

        .visit_item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 16px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .visit_item:last-child {
            border-bottom: none;
        }

        .visit_date_block {
            text-align: center;
            width: 52px;
            flex-shrink: 0;
        }

        .visit_date_day {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }

        .visit_date_month {
            font-size: 12px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.35);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .visit_dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #014bff;
            flex-shrink: 0;
        }

        .visit_info {
            flex: 1;
        }

        .visit_type {
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 2px;
        }

        .visit_doctor {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.45);
        }

        .visit_tag {
            padding: 5px 14px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .tag_green {
            background: rgba(0, 200, 100, 0.15);
            color: #00c864;
        }

        .tag_blue {
            background: rgba(1, 75, 255, 0.15);
            color: #4d90ff;
        }

        .tag_yellow {
            background: rgba(206, 222, 89, 0.15);
            color: #c8d847;
        }

        .tag_red {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .tag_orange {
            background: rgba(255, 140, 66, 0.15);
            color: #ff8c42;
        }

        .empty_state_small {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            color: rgba(255, 255, 255, 0.4);
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
                        <a href="{{ route('profile') }}" class="profile_nav_item">
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
                    @if (session('success'))
                        <div
                            style="background: rgba(0,200,100,0.15); border: 1px solid #00c864; color: #00c864; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($pet)
                        <!-- PET SWITCHER -->
                        <div class="pet_switcher">
                            @php
                                $pets = \App\Models\Pet::where('user_id', $user->id)->where('is_active', true)->get();
                            @endphp
                            @foreach ($pets as $p)
                                <a href="{{ route('pet.profile', $p->id) }}"
                                    class="pet_tab {{ $pet->id == $p->id ? 'active' : '' }}">
                                    <span class="pet_tab_emoji">{{ $p->emoji }}</span>
                                    <div>
                                        <div class="pet_tab_name">{{ $p->name }}</div>
                                        <div class="pet_tab_breed">{{ $p->breed ?? $p->type_ru }}</div>
                                    </div>
                                </a>
                            @endforeach
                            <a href="{{ route('pets.create') }}" class="pet_tab_add" title="Добавить питомца">+</a>
                        </div>

                        <!-- PET HERO -->
                        <div class="pet_hero">
                            <div class="pet_hero_emoji">{{ $pet->emoji }}</div>
                            <div class="pet_hero_info">
                                <div class="pet_hero_name">{{ $pet->name }}</div>
                                <div class="pet_hero_meta">
                                    <div class="pet_hero_badge"><span>Вид</span><span>{{ $pet->type_ru }}</span></div>
                                    @if ($pet->breed)
                                        <div class="pet_hero_badge"><span>Порода</span><span>{{ $pet->breed }}</span>
                                        </div>
                                    @endif
                                    <div class="pet_hero_badge"><span>Возраст</span><span>{{ $pet->age }}</span></div>
                                    @if ($pet->gender_ru)
                                        <div class="pet_hero_badge"><span>Пол</span><span>{{ $pet->gender_ru }}</span>
                                        </div>
                                    @endif
                                    @if ($pet->weight)
                                        <div class="pet_hero_badge"><span>Вес</span><span>{{ $pet->weight }} кг</span>
                                        </div>
                                    @endif
                                    @if ($pet->chip_number)
                                        <div class="pet_hero_badge"><span>Чип</span><span>{{ $pet->chip_number }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="pet_hero_edit">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                                Редактировать
                            </a>
                        </div>

                        <!-- INFO STATS (реальные данные) -->
                        <div class="info_grid">
                            <div class="info_card">
                                <div class="info_card_label">Посещений всего</div>
                                <div class="info_card_value" id="totalVisits">0</div>
                                <div class="info_card_sub">за всё время</div>
                            </div>
                            <div class="info_card">
                                <div class="info_card_label">Последний визит</div>
                                <div class="info_card_value" id="lastVisit">—</div>
                                <div class="info_card_sub" id="lastVisitDesc"></div>
                            </div>
                            <div class="info_card">
                                <div class="info_card_label">Предстоящие приёмы</div>
                                <div class="info_card_value" id="upcomingCount">0</div>
                                <div class="info_card_sub">запланировано</div>
                            </div>
                        </div>

                        <!-- NEXT APPOINTMENT (реальный ближайший приём) -->
                        <div class="next_appt" id="nextAppointment" style="cursor: pointer; display: none;">
                            <div class="next_appt_icon">📅</div>
                            <div class="next_appt_info">
                                <div class="next_appt_label">Ближайший приём</div>
                                <div class="next_appt_title" id="nextAppointmentTitle">Запись к врачу</div>
                                <div class="next_appt_meta" id="nextAppointmentMeta"></div>
                            </div>
                            <a href="#" class="next_appt_btn" id="nextAppointmentBtn">Подробнее</a>
                        </div>

                        <!-- Нет ближайших приёмов -->
                        <div class="next_appt" id="noNextAppointment" style="cursor: pointer;">
                            <div class="next_appt_icon">📅</div>
                            <div class="next_appt_info">
                                <div class="next_appt_label">Ближайший приём</div>
                                <div class="next_appt_title">Нет запланированных приёмов</div>
                                <div class="next_appt_meta">Запишитесь на приём онлайн</div>
                            </div>
                            <a href="{{ route('services') }}" class="next_appt_btn">Записаться</a>
                        </div>

                        <!-- VISIT HISTORY (реальная история) -->
                        <div class="profile_block">
                            <div class="profile_block_header">
                                <div class="profile_block_title">История посещений</div>
                                <a href="{{ route('appointments.my') }}" class="profile_block_link">Все посещения →</a>
                            </div>
                            <div class="visit_list" id="visitHistoryList">
                                <div class="empty_state_small">Загрузка истории посещений...</div>
                            </div>
                        </div>

                        <!-- UPCOMING APPOINTMENTS (реальные предстоящие приёмы) -->
                        <div class="profile_block">
                            <div class="profile_block_header">
                                <div class="profile_block_title">Предстоящие приёмы</div>
                                <a href="{{ route('appointments.my') }}" class="profile_block_link">Все записи →</a>
                            </div>
                            <div class="visit_list" id="upcomingAppointmentsList">
                                <div class="empty_state_small">Загрузка предстоящих приёмов...</div>
                            </div>
                        </div>

                        <!-- PROMO CARDS -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="info_card"
                                style="background: rgba(1, 75, 255, 0.1); border: 1px solid rgba(1, 75, 255, 0.2); cursor: pointer;"
                                onclick="window.location.href='{{ route('services') }}'">
                                <div class="info_card_label">Запись онлайн</div>
                                <div class="info_card_value" style="font-size: 17px; line-height: 1.4">
                                    Запишитесь к врачу не выходя из дома
                                </div>
                                <div style="color: #014bff; font-size: 14px; font-weight: 700; margin-top: 4px;">Выбрать
                                    услугу →</div>
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
                    @else
                        <!-- Нет выбранного питомца - показываем список -->
                        <div>
                            <h1 class="profile_section_title">Мои питомцы</h1>
                            <p class="profile_section_sub">
                                Выберите питомца, чтобы посмотреть историю посещений и записаться на приём
                            </p>
                        </div>

                        @php
                            $pets = \App\Models\Pet::where('user_id', $user->id)->where('is_active', true)->get();
                        @endphp

                        @if ($pets->count() > 0)
                            <div class="pets_grid">
                                @foreach ($pets as $p)
                                    <a href="{{ route('pet.profile', $p->id) }}" class="pet_card">
                                        <div class="pet_emoji">{{ $p->emoji }}</div>
                                        <div class="pet_info">
                                            <div class="pet_name">{{ $p->name }}</div>
                                            <div class="pet_details">
                                                {{ $p->type_ru }} • {{ $p->gender_ru }} • {{ $p->age }}
                                            </div>
                                            @if ($p->breed || $p->weight)
                                                <div class="pet_details" style="margin-top: 4px;">
                                                    @if ($p->breed)
                                                        {{ $p->breed }}
                                                    @endif
                                                    @if ($p->weight)
                                                        • {{ $p->weight }} кг
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
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
                    @endif
                </main>
            </div>
        </div>

        <script>
            // Загрузка реальных данных о записях для питомца
            function loadAppointmentsData(petId) {
                fetch(`/api/pet/${petId}/appointments`)
                    .then(response => response.json())
                    .then(data => {
                        // Обновляем статистику
                        document.getElementById('totalVisits').innerHTML = data.total_visits;
                        document.getElementById('upcomingCount').innerHTML = data.upcoming_count;

                        if (data.last_visit) {
                            document.getElementById('lastVisit').innerHTML = data.last_visit.date;
                            document.getElementById('lastVisitDesc').innerHTML = data.last_visit.service;
                        } else {
                            document.getElementById('lastVisit').innerHTML = '—';
                            document.getElementById('lastVisitDesc').innerHTML = '';
                        }

                        // Ближайший приём
                        if (data.next_appointment) {
                            document.getElementById('nextAppointment').style.display = 'flex';
                            document.getElementById('noNextAppointment').style.display = 'none';
                            document.getElementById('nextAppointmentTitle').innerHTML = data.next_appointment.service;
                            document.getElementById('nextAppointmentMeta').innerHTML =
                                `${data.next_appointment.date_formatted} · ${data.next_appointment.time} · Врач ${data.next_appointment.doctor}`;
                            document.getElementById('nextAppointmentBtn').href = `/appointments/my`;
                        } else {
                            document.getElementById('nextAppointment').style.display = 'none';
                            document.getElementById('noNextAppointment').style.display = 'flex';
                        }

                        // История посещений
                        if (data.visit_history && data.visit_history.length > 0) {
                            let historyHtml = '';
                            data.visit_history.forEach(visit => {
                                historyHtml += `
                                    <div class="visit_item">
                                        <div class="visit_date_block">
                                            <div class="visit_date_day">${visit.day}</div>
                                            <div class="visit_date_month">${visit.month}</div>
                                        </div>
                                        <div class="visit_dot"></div>
                                        <div class="visit_info">
                                            <div class="visit_type">${visit.service}</div>
                                            <div class="visit_doctor">Врач ${visit.doctor}</div>
                                        </div>
                                        <div class="visit_tag ${visit.status_class}">${visit.status_ru}</div>
                                    </div>
                                `;
                            });
                            document.getElementById('visitHistoryList').innerHTML = historyHtml;
                        } else {
                            document.getElementById('visitHistoryList').innerHTML = `
                                <div class="empty_state_small">
                                    📋 История посещений пуста<br>
                                    <small>Запишите питомца на приём</small>
                                </div>
                            `;
                        }

                        // Предстоящие приёмы
                        if (data.upcoming_appointments && data.upcoming_appointments.length > 0) {
                            let upcomingHtml = '';
                            data.upcoming_appointments.forEach(app => {
                                upcomingHtml += `
                                    <div class="visit_item">
                                        <div class="visit_date_block">
                                            <div class="visit_date_day">${app.day}</div>
                                            <div class="visit_date_month">${app.month}</div>
                                        </div>
                                        <div class="visit_dot" style="background: #014bff;"></div>
                                        <div class="visit_info">
                                            <div class="visit_type">${app.service}</div>
                                            <div class="visit_doctor">Врач ${app.doctor} • ${app.time}</div>
                                        </div>
                                        <div class="visit_tag ${app.status_class}">${app.status_ru}</div>
                                    </div>
                                `;
                            });
                            document.getElementById('upcomingAppointmentsList').innerHTML = upcomingHtml;
                        } else {
                            document.getElementById('upcomingAppointmentsList').innerHTML = `
                                <div class="empty_state_small">
                                    📅 Нет запланированных приёмов<br>
                                    <small>Запишитесь к врачу онлайн</small>
                                </div>
                            `;
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка загрузки данных:', error);
                        document.getElementById('visitHistoryList').innerHTML = `
                            <div class="empty_state_small">Ошибка загрузки истории посещений</div>
                        `;
                        document.getElementById('upcomingAppointmentsList').innerHTML = `
                            <div class="empty_state_small">Ошибка загрузки предстоящих приёмов</div>
                        `;
                    });
            }

            document.addEventListener('DOMContentLoaded', function() {
                @if ($pet)
                    loadAppointmentsData({{ $pet->id }});
                @endif
            });

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
        </script>
    </body>
@endsection
