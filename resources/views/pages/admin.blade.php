{{-- resources/views/pages/admin.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="profile_page">
        <div class="profile_layout">
            <aside class="profile_sidebar">
                <div class="profile_user_card">
                    <div class="profile_avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <div class="profile_user_name">{{ auth()->user()->name }}</div>
                    <div class="profile_user_email">{{ auth()->user()->email }}</div>
                    <div class="profile_user_role">Администратор</div>
                </div>
                <nav class="profile_nav">
                    <a href="#" class="profile_nav_item active" onclick="showTab('users')">
                        <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                        </svg>
                        Пользователи
                    </a>
                    <a href="#" class="profile_nav_item" onclick="showTab('doctors')">
                        <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        Врачи
                    </a>
                    <a href="#" class="profile_nav_item" onclick="showTab('positions')">
                        <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        Должности
                    </a>
                    <a href="#" class="profile_nav_item" onclick="showTab('service_categories')">
                        <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M4 4h16v16H4z" />
                            <circle cx="12" cy="12" r="3" />
                            <line x1="12" y1="8" x2="12" y2="4" />
                            <line x1="12" y1="20" x2="12" y2="16" />
                            <line x1="8" y1="12" x2="4" y2="12" />
                            <line x1="20" y1="12" x2="16" y2="12" />
                        </svg>
                        Категории услуг
                    </a>
                    <a href="#" class="profile_nav_item" onclick="showTab('services')">
                        <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M20 12H4M12 4v16M8 8l4-4 4 4M8 16l4 4 4-4" />
                        </svg>
                        Услуги
                    </a>
                    <a href="#" class="profile_nav_item" onclick="showTab('appointments')">
                        <svg class="profile_nav_icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                            <circle cx="12" cy="15" r="1" />
                            <circle cx="16" cy="15" r="1" />
                            <circle cx="8" cy="15" r="1" />
                        </svg>
                        Управление записями
                    </a>
                </nav>
            </aside>
            <main class="profile_main">
                <!-- ==================== ВКЛАДКА: ПОЛЬЗОВАТЕЛИ ==================== -->
                <div id="usersTab" class="tab-content">
                    <h1>Панель администратора</h1>
                    <p>Добро пожаловать, {{ auth()->user()->name }}!</p>

                    <h2 style="margin-top: 30px;">Список пользователей</h2>
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                            <thead>
                                <tr style="background: rgba(1,75,255,0.1); border-bottom: 2px solid rgba(1,75,255,0.3);">
                                    <th style="padding: 12px; text-align: left;">ID</th>
                                    <th style="padding: 12px; text-align: left;">Имя</th>
                                    <th style="padding: 12px; text-align: left;">Email</th>
                                    <th style="padding: 12px; text-align: left;">Роль</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                                        <td style="padding: 12px;">{{ $user->id }}</td>
                                        <td style="padding: 12px;">{{ $user->name }}</td>
                                        <td style="padding: 12px;">{{ $user->email }}</td>
                                        <td style="padding: 12px;">
                                            <span
                                                style="background: {{ $user->role === 'admin' ? '#014bff' : ($user->role === 'doctor' ? '#00c864' : 'rgba(255,255,255,0.1)') }}; padding: 4px 12px; border-radius: 20px; font-size: 12px;">
                                                {{ $user->role === 'admin' ? 'Администратор' : ($user->role === 'doctor' ? 'Врач' : 'Пользователь') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ==================== ВКЛАДКА: ВРАЧИ ==================== -->
                <div id="doctorsTab" class="tab-content" style="display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <div>
                            <h1>Управление врачами</h1>
                            <p style="color: rgba(255,255,255,0.6); margin-top: 5px;">Всего врачей: {{ $doctors->count() }}
                            </p>
                        </div>
                        <button class="header_auth" onclick="openCreateDoctorModal()"
                            style="padding: 12px 24px; border: none; cursor: pointer;">+ Добавить врача</button>
                    </div>

                    @if (session('success'))
                        <div
                            style="background: rgba(0,200,100,0.15); border: 1px solid #00c864; color: #00c864; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">
                            {{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div
                            style="background: rgba(239,68,68,0.15); border: 1px solid #ef4444; color: #ef4444; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">
                            {{ session('error') }}</div>
                    @endif

                    @foreach ($departments as $department)
                        @php $deptDoctors = $doctors->where('department', $department); @endphp
                        <div style="margin-bottom: 40px;">
                            <h2
                                style="color: #014bff; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(1,75,255,0.3);">
                                {{ $department }}</h2>
                            @if ($deptDoctors->count() > 0)
                                <div
                                    style="display: grid; gap: 20px; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));">
                                    @foreach ($deptDoctors as $doctor)
                                        <div
                                            style="background: #1a1a2e; border-radius: 16px; padding: 20px; display: flex; gap: 20px;">
                                            <div style="flex-shrink: 0;">
                                                @php
                                                    $photoPath = null;
                                                    if ($doctor->photo) {
                                                        if (str_starts_with($doctor->photo, 'doctors/')) {
                                                            $photoPath = asset('storage/' . $doctor->photo);
                                                        } elseif (
                                                            file_exists(public_path('assets/images/' . $doctor->photo))
                                                        ) {
                                                            $photoPath = asset('assets/images/' . $doctor->photo);
                                                        } else {
                                                            $photoPath = asset($doctor->photo);
                                                        }
                                                    }
                                                @endphp
                                                @if ($photoPath)
                                                    <img src="{{ $photoPath }}" alt="{{ $doctor->name }}"
                                                        style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                                                @else
                                                    <div
                                                        style="width: 120px; height: 120px; border-radius: 50%; background: #014bff; display: flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold;">
                                                        {{ mb_substr($doctor->name, 0, 1) }}</div>
                                                @endif
                                            </div>
                                            <div style="flex: 1;">
                                                <h3 style="color: white; margin-bottom: 5px;">{{ $doctor->name }}</h3>
                                                <p style="color: #014bff; font-weight: 600; margin-bottom: 5px;">
                                                    {{ $doctor->specialization }}</p>
                                                <p style="color: rgba(255,255,255,0.6); font-size: 14px;">Должность:
                                                    {{ $doctor->position ? $doctor->position->name : 'Не указана' }}</p>
                                                <p style="color: #00c864; font-weight: 700; margin-top: 5px;">от
                                                    {{ number_format($doctor->price, 0, ',', ' ') }} ₽</p>
                                            </div>
                                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                                <button onclick="editDoctor({{ $doctor->id }})"
                                                    class="btn-edit">Редактировать</button>
                                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Вы уверены, что хотите удалить этого врача?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn-delete">Удалить</button>
                                                </form>
                                                <a href="{{ route('doctor.public', $doctor->id) }}" target="_blank"
                                                    class="btn-view">Просмотр</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    style="background: #1a1a2e; border-radius: 16px; padding: 30px; text-align: center; color: rgba(255,255,255,0.4);">
                                    Нет врачей в этом отделении</div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- ==================== ВКЛАДКА: ДОЛЖНОСТИ ==================== -->
                <div id="positionsTab" class="tab-content" style="display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <div>
                            <h1>Управление должностями</h1>
                            <p style="color: rgba(255,255,255,0.6); margin-top: 5px;">Всего должностей:
                                {{ $positions->count() }}</p>
                        </div>
                        <button class="header_auth" onclick="openCreatePositionModal()"
                            style="padding: 12px 24px; border: none; cursor: pointer;">+ Создать должность</button>
                    </div>
                    @foreach ($departments as $department)
                        @php $deptPositions = $positions->where('department', $department); @endphp
                        <div style="margin-bottom: 40px;">
                            <h2
                                style="color: #014bff; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(1,75,255,0.3);">
                                {{ $department }}</h2>
                            @if ($deptPositions->count() > 0)
                                <div style="display: grid; gap: 15px;">
                                    @foreach ($deptPositions as $position)
                                        <div
                                            style="background: #1a1a2e; border-radius: 16px; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <h3 style="color: white; margin-bottom: 5px;">{{ $position->name }}</h3>
                                                @if ($position->description)
                                                    <p style="color: rgba(255,255,255,0.5); font-size: 14px;">
                                                        {{ $position->description }}</p>
                                                @endif
                                                <p style="color: rgba(255,255,255,0.4); font-size: 12px; margin-top: 8px;">
                                                    Врачей с этой должностью: {{ $position->doctors()->count() }}</p>
                                            </div>
                                            <div style="display: flex; gap: 10px;">
                                                <button
                                                    onclick="editPosition({{ $position->id }}, '{{ addslashes($position->name) }}', '{{ $position->department }}', '{{ addslashes($position->description) }}')"
                                                    class="btn-edit">Редактировать</button>
                                                <form action="{{ route('admin.positions.destroy', $position->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Вы уверены, что хотите удалить эту должность?');"
                                                    style="display: inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn-delete">Удалить</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    style="background: #1a1a2e; border-radius: 16px; padding: 30px; text-align: center; color: rgba(255,255,255,0.4);">
                                    Нет должностей в этом отделении</div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- ==================== ВКЛАДКА: КАТЕГОРИИ УСЛУГ ==================== -->
                <div id="serviceCategoriesTab" class="tab-content" style="display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <div>
                            <h1>Управление категориями услуг</h1>
                            <p style="color: rgba(255,255,255,0.6); margin-top: 5px;">Всего категорий:
                                {{ \App\Models\ServiceCategory::count() }}</p>
                        </div>
                        <button class="header_auth" onclick="openCreateServiceCategoryModal()"
                            style="padding: 12px 24px; border: none; cursor: pointer;">+ Создать категорию</button>
                    </div>
                    @foreach ($departments as $department)
                        @php $categories = \App\Models\ServiceCategory::where('department', $department)->orderBy('sort_order')->get(); @endphp
                        <div style="margin-bottom: 40px;">
                            <h2
                                style="color: #014bff; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(1,75,255,0.3);">
                                {{ $department }}</h2>
                            @if ($categories->count() > 0)
                                <div style="display: grid; gap: 15px;">
                                    @foreach ($categories as $category)
                                        <div
                                            style="background: #1a1a2e; border-radius: 16px; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <h3 style="color: white; margin-bottom: 5px;">{{ $category->name }}</h3>
                                                <p style="color: rgba(255,255,255,0.4); font-size: 12px;">Порядок
                                                    сортировки: {{ $category->sort_order }} | Статус: <span
                                                        style="color: {{ $category->is_active ? '#00c864' : '#ef4444' }};">{{ $category->is_active ? 'Активна' : 'Неактивна' }}</span>
                                                </p>
                                            </div>
                                            <div style="display: flex; gap: 10px;">
                                                <button
                                                    onclick="editServiceCategory({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ $category->department }}', {{ $category->sort_order }}, {{ $category->is_active ? 'true' : 'false' }})"
                                                    class="btn-edit">Редактировать</button>
                                                <form
                                                    action="{{ route('admin.service-categories.destroy', $category->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');"
                                                    style="display: inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn-delete">Удалить</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    style="background: #1a1a2e; border-radius: 16px; padding: 30px; text-align: center; color: rgba(255,255,255,0.4);">
                                    Нет категорий услуг в этом отделении</div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- ==================== ВКЛАДКА: УСЛУГИ ==================== -->
                <div id="servicesTab" class="tab-content" style="display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <div>
                            <h1>Управление услугами</h1>
                            <p style="color: rgba(255,255,255,0.6); margin-top: 5px;">Всего услуг:
                                {{ \App\Models\Service::count() }}</p>
                        </div>
                        <button class="header_auth" onclick="openCreateServiceModal()"
                            style="padding: 12px 24px; border: none; cursor: pointer;">+ Добавить услугу</button>
                    </div>
                    @if (session('success'))
                        <div
                            style="background: rgba(0,200,100,0.15); border: 1px solid #00c864; color: #00c864; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">
                            {{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div
                            style="background: rgba(239,68,68,0.15); border: 1px solid #ef4444; color: #ef4444; padding: 12px 20px; border-radius: 12px; margin-bottom: 20px;">
                            {{ session('error') }}</div>
                    @endif
                    @foreach ($departments as $department)
                        @php
                            $categories = \App\Models\ServiceCategory::where('department', $department)
                                ->where('is_active', true)
                                ->orderBy('sort_order')
                                ->get();
                            $hasServices = false;
                            foreach ($categories as $cat) {
                                if ($cat->services()->count() > 0) {
                                    $hasServices = true;
                                }
                            }
                        @endphp
                        @if ($hasServices || $categories->count() > 0)
                            <div style="margin-bottom: 40px;">
                                <h2
                                    style="color: #014bff; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(1,75,255,0.3);">
                                    {{ $department }}</h2>
                                @foreach ($categories as $category)
                                    @php $services = $category->services()->orderBy('sort_order')->get(); @endphp
                                    @if ($services->count() > 0)
                                        <div style="margin-bottom: 25px;">
                                            <h3
                                                style="color: white; margin-bottom: 15px; padding-left: 10px; border-left: 3px solid #014bff;">
                                                {{ $category->name }}</h3>
                                            <div style="display: grid; gap: 12px;">
                                                @foreach ($services as $service)
                                                    <div
                                                        style="background: #1a1a2e; border-radius: 16px; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center;">
                                                        <div>
                                                            <h4 style="color: white; margin-bottom: 5px;">
                                                                {{ $service->name }}</h4>
                                                            <p style="color: rgba(255,255,255,0.4); font-size: 12px;">
                                                                Порядок сортировки: {{ $service->sort_order }} | Статус:
                                                                <span
                                                                    style="color: {{ $service->is_active ? '#00c864' : '#ef4444' }};">{{ $service->is_active ? 'Активна' : 'Неактивна' }}</span>
                                                            </p>
                                                        </div>
                                                        <div style="text-align: right;">
                                                            <p
                                                                style="color: #00c864; font-weight: 700; font-size: 18px; margin-bottom: 8px;">
                                                                {{ number_format($service->price, 0, ',', ' ') }} ₽</p>
                                                            <div style="display: flex; gap: 8px;">
                                                                <button onclick="editService({{ $service->id }})"
                                                                    class="btn-edit">Редактировать</button>
                                                                <form
                                                                    action="{{ route('admin.services.destroy', $service->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Вы уверены, что хотите удалить эту услугу?');"
                                                                    style="display: inline;">
                                                                    @csrf @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn-delete">Удалить</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- ==================== ВКЛАДКА: УПРАВЛЕНИЕ ЗАПИСЯМИ ==================== -->
                <div id="appointmentsTab" class="tab-content" style="display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <div>
                            <h1>Управление записями</h1>
                            <p style="color: rgba(255,255,255,0.6); margin-top: 5px;">Управление записями пациентов на
                                приём</p>
                        </div>
                        <div class="filters">
                            <select class="filter_select" id="appointmentStatusFilter" onchange="loadAppointmentsData()">
                                <option value="all">Все статусы</option>
                                <option value="pending">Ожидает подтверждения</option>
                                <option value="confirmed">Подтверждён</option>
                                <option value="completed">Завершён</option>
                                <option value="cancelled">Отменён</option>
                            </select>
                            <input type="date" class="filter_date" id="appointmentDateFilter"
                                onchange="loadAppointmentsData()">
                            <button class="header_auth" onclick="loadAppointmentsData()"
                                style="padding: 8px 16px;">Обновить</button>
                        </div>
                    </div>
                    <div id="appointmentsTableContainer">
                        <div style="text-align: center; padding: 60px;">
                            <div class="loading_spinner"></div> Загрузка записей...
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- ==================== МОДАЛЬНЫЕ ОКНА ==================== -->

    <!-- Модальное окно: Создание врача -->
    <div id="createDoctorModal" class="modal">
        <div class="modal-content modal-large">
            <div class="modal-header">
                <h2>Добавление врача</h2><span class="close" onclick="closeCreateDoctorModal()">&times;</span>
            </div>
            <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group full-width"><label>ФИО врача *</label><input type="text" name="name"
                            required class="form-control" placeholder="Иванов Иван Иванович"></div>
                    <div class="form-group"><label>Специализация *</label><input type="text" name="specialization"
                            required class="form-control" placeholder="Например: Хирург, Терапевт"></div>
                    <div class="form-group"><label>Отделение *</label><select name="department" id="doctor_department"
                            required class="form-control" onchange="loadPositions()">
                            <option value="">Выберите отделение</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department }}">{{ $department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><label>Должность</label><select name="position_id" id="doctor_position"
                            class="form-control">
                            <option value="">Выберите должность</option>
                        </select></div>
                    <div class="form-group"><label>Email *</label><input type="email" name="email" required
                            class="form-control" placeholder="doctor@example.com"></div>
                    <div class="form-group"><label>Телефон</label><input type="text" name="phone"
                            class="form-control" placeholder="+7 (___) ___-__-__"></div>
                    <div class="form-group"><label>Стоимость приема (₽) *</label><input type="number" name="price"
                            required class="form-control" step="100" min="0" placeholder="1500"></div>
                    <div class="form-group"><label>Опыт (лет)</label><input type="number" name="experience"
                            class="form-control" min="0" placeholder="5"></div>
                    <div class="form-group full-width"><label>Фотография</label><input type="file" name="photo"
                            class="form-control" accept="image/*"><small
                            style="color: rgba(255,255,255,0.4);">Поддерживаются: JPEG, PNG, JPG, GIF. Максимум 2MB</small>
                    </div>
                    <div class="form-group full-width"><label>Образование</label>
                        <textarea name="education" rows="2" class="form-control"
                            placeholder="Казанская государственная академия ветеринарной медицины, 2010"></textarea>
                    </div>
                    <div class="form-group full-width"><label>Описание</label>
                        <textarea name="description" rows="3" class="form-control"
                            placeholder="Информация о враче, его достижениях и опыте..."></textarea>
                    </div>
                </div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Сохранить</button><button
                        type="button" class="btn-secondary" onclick="closeCreateDoctorModal()">Отмена</button></div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Редактирование врача -->
    <div id="editDoctorModal" class="modal">
        <div class="modal-content modal-large">
            <div class="modal-header">
                <h2>Редактирование врача</h2><span class="close" onclick="closeEditDoctorModal()">&times;</span>
            </div>
            <form id="editDoctorForm" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group full-width"><label>ФИО врача *</label><input type="text" name="name"
                            id="edit_name" required class="form-control"></div>
                    <div class="form-group"><label>Специализация *</label><input type="text" name="specialization"
                            id="edit_specialization" required class="form-control"></div>
                    <div class="form-group"><label>Отделение *</label><select name="department" id="edit_department"
                            required class="form-control" onchange="loadPositionsForEdit()">
                            <option value="">Выберите отделение</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department }}">{{ $department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><label>Должность</label><select name="position_id" id="edit_position"
                            class="form-control">
                            <option value="">Выберите должность</option>
                        </select></div>
                    <div class="form-group"><label>Email *</label><input type="email" name="email" id="edit_email"
                            required class="form-control"></div>
                    <div class="form-group"><label>Телефон</label><input type="text" name="phone" id="edit_phone"
                            class="form-control"></div>
                    <div class="form-group"><label>Стоимость приема (₽) *</label><input type="number" name="price"
                            id="edit_price" required class="form-control" step="100" min="0"></div>
                    <div class="form-group"><label>Опыт (лет)</label><input type="number" name="experience"
                            id="edit_experience" class="form-control" min="0"></div>
                    <div class="form-group"><label>Активен</label><select name="is_active" id="edit_is_active"
                            class="form-control">
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select></div>
                    <div class="form-group full-width"><label>Фотография</label><input type="file" name="photo"
                            class="form-control" accept="image/*"><small style="color: rgba(255,255,255,0.4);">Оставьте
                            пустым, чтобы не менять текущую фотографию</small></div>
                    <div class="form-group full-width"><label>Образование</label>
                        <textarea name="education" id="edit_education" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group full-width"><label>Описание</label>
                        <textarea name="description" id="edit_description" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Сохранить</button><button
                        type="button" class="btn-secondary" onclick="closeEditDoctorModal()">Отмена</button></div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Создание должности -->
    <div id="createPositionModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Создание должности</h2><span class="close" onclick="closeCreatePositionModal()">&times;</span>
            </div>
            <form action="{{ route('admin.positions.store') }}" method="POST">
                @csrf
                <div class="form-group"><label>Название должности *</label><input type="text" name="name" required
                        class="form-control" placeholder="Например: Врач-хирург"></div>
                <div class="form-group"><label>Отделение *</label><select name="department" required
                        class="form-control">
                        <option value="">Выберите отделение</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label>Описание должности</label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Обязанности, требования и т.д."></textarea><small style="color: rgba(255,255,255,0.4);">Необязательное поле</small>
                </div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Создать</button><button
                        type="button" class="btn-secondary" onclick="closeCreatePositionModal()">Отмена</button></div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Редактирование должности -->
    <div id="editPositionModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Редактирование должности</h2><span class="close" onclick="closeEditPositionModal()">&times;</span>
            </div>
            <form id="editPositionForm" method="POST">
                @csrf @method('PUT')
                <div class="form-group"><label>Название должности *</label><input type="text" name="name"
                        id="edit_position_name" required class="form-control"></div>
                <div class="form-group"><label>Отделение *</label><select name="department" id="edit_position_department"
                        required class="form-control">
                        <option value="">Выберите отделение</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label>Описание должности</label>
                    <textarea name="description" id="edit_position_description" rows="3" class="form-control"></textarea><small style="color: rgba(255,255,255,0.4);">Необязательное поле</small>
                </div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Сохранить</button><button
                        type="button" class="btn-secondary" onclick="closeEditPositionModal()">Отмена</button></div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Создание категории услуги -->
    <div id="createServiceCategoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Создание категории услуги</h2><span class="close"
                    onclick="closeCreateServiceCategoryModal()">&times;</span>
            </div>
            <form action="{{ route('admin.service-categories.store') }}" method="POST">
                @csrf
                <div class="form-group"><label>Название категории *</label><input type="text" name="name" required
                        class="form-control" placeholder="Например: Консультация, Диагностика, Лечение"></div>
                <div class="form-group"><label>Отделение *</label><select name="department" required
                        class="form-control">
                        <option value="">Выберите отделение</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label>Порядок сортировки</label><input type="number" name="sort_order"
                        class="form-control" value="0" min="0"
                        placeholder="Чем меньше число, тем выше в списке"><small
                        style="color: rgba(255,255,255,0.4);">Определяет порядок отображения в аккордеоне</small></div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Создать</button><button
                        type="button" class="btn-secondary" onclick="closeCreateServiceCategoryModal()">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Редактирование категории услуги -->
    <div id="editServiceCategoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Редактирование категории услуги</h2><span class="close"
                    onclick="closeEditServiceCategoryModal()">&times;</span>
            </div>
            <form id="editServiceCategoryForm" method="POST">
                @csrf @method('PUT')
                <div class="form-group"><label>Название категории *</label><input type="text" name="name"
                        id="edit_category_name" required class="form-control"></div>
                <div class="form-group"><label>Отделение *</label><select name="department" id="edit_category_department"
                        required class="form-control">
                        <option value="">Выберите отделение</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label>Порядок сортировки</label><input type="number" name="sort_order"
                        id="edit_category_sort_order" class="form-control" min="0"><small
                        style="color: rgba(255,255,255,0.4);">Определяет порядок отображения в аккордеоне</small></div>
                <div class="form-group"><label>Статус</label><select name="is_active" id="edit_category_is_active"
                        class="form-control">
                        <option value="1">Активна</option>
                        <option value="0">Неактивна</option>
                    </select></div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Сохранить</button><button
                        type="button" class="btn-secondary" onclick="closeEditServiceCategoryModal()">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Создание услуги -->
    <div id="createServiceModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Добавление услуги</h2><span class="close" onclick="closeCreateServiceModal()">&times;</span>
            </div>
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="form-group"><label>Отделение *</label><select id="service_department" required
                        class="form-control" onchange="loadCategoriesForService()">
                        <option value="">Выберите отделение</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><label>Вид услуги (категория) *</label><select name="category_id"
                        id="service_category" required class="form-control">
                        <option value="">Сначала выберите отделение</option>
                    </select></div>
                <div class="form-group"><label>Название услуги *</label><input type="text" name="name" required
                        class="form-control" placeholder="Например: Первичный прием терапевта"></div>
                <div class="form-group"><label>Стоимость (₽) *</label><input type="number" name="price" required
                        class="form-control" step="100" min="0" placeholder="1500"></div>
                <div class="form-group"><label>Порядок сортировки</label><input type="number" name="sort_order"
                        class="form-control" value="0" min="0"
                        placeholder="Чем меньше число, тем выше в списке"><small
                        style="color: rgba(255,255,255,0.4);">Определяет порядок отображения внутри категории</small></div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Создать</button><button
                        type="button" class="btn-secondary" onclick="closeCreateServiceModal()">Отмена</button></div>
            </form>
        </div>
    </div>

    <!-- Модальное окно: Редактирование услуги -->
    <div id="editServiceModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Редактирование услуги</h2><span class="close" onclick="closeEditServiceModal()">&times;</span>
            </div>
            <form id="editServiceForm" method="POST">
                @csrf @method('PUT')
                <div class="form-group"><label>Отделение *</label><select id="edit_service_department" required
                        class="form-control" onchange="loadCategoriesForEditService()">
                        <option value="">Выберите отделение</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select></div>
                <div class="form-group"><label>Вид услуги (категория) *</label><select name="category_id"
                        id="edit_service_category" required class="form-control">
                        <option value="">Сначала выберите отделение</option>
                    </select></div>
                <div class="form-group"><label>Название услуги *</label><input type="text" name="name"
                        id="edit_service_name" required class="form-control"></div>
                <div class="form-group"><label>Стоимость (₽) *</label><input type="number" name="price"
                        id="edit_service_price" required class="form-control" step="100" min="0"></div>
                <div class="form-group"><label>Порядок сортировки</label><input type="number" name="sort_order"
                        id="edit_service_sort_order" class="form-control" min="0"><small
                        style="color: rgba(255,255,255,0.4);">Определяет порядок отображения внутри категории</small></div>
                <div class="form-group"><label>Статус</label><select name="is_active" id="edit_service_is_active"
                        class="form-control">
                        <option value="1">Активна</option>
                        <option value="0">Неактивна</option>
                    </select></div>
                <div class="modal-buttons"><button type="submit" class="btn-primary">Сохранить</button><button
                        type="button" class="btn-secondary" onclick="closeEditServiceModal()">Отмена</button></div>
            </form>
        </div>
    </div>

    <style>
        .profile_layout {
            margin-top: 20px;
        }

        td,
        th,
        h1,
        h2,
        .profile_user_role {
            color: #fff;
        }

        .btn-edit,
        .btn-delete,
        .btn-view {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
            font-family: Nunito, sans-serif;
            transition: all 0.2s;
            display: inline-block;
            text-align: center;
        }

        .btn-edit {
            background: rgba(1, 75, 255, 0.15);
            color: #014bff;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .btn-view {
            background: rgba(0, 200, 100, 0.15);
            color: #00c864;
        }

        .btn-edit:hover,
        .btn-delete:hover,
        .btn-view:hover {
            transform: translateY(-1px);
        }

        .loading_spinner {
            display: inline-block;
            width: 24px;
            height: 24px;
            border: 2px solid #014bff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.6s linear infinite;
            margin-right: 10px;
            vertical-align: middle;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .filters {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter_select,
        .filter_date {
            padding: 10px 16px;
            background: #23233a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
        }

        .appointments_table {
            background: #23233a;
            border-radius: 20px;
            overflow-x: auto;
        }

        .appointments_table table {
            width: 100%;
            border-collapse: collapse;
        }

        .appointments_table th,
        .appointments_table td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .appointments_table th {
            font-size: 13px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .appointments_table td {
            font-size: 14px;
            color: #fff;
        }

        .status_select {
            padding: 6px 12px;
            border-radius: 8px;
            background: #1b1b29;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 13px;
            cursor: pointer;
        }

        .update_status_btn {
            background: #014bff;
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
            margin-left: 8px;
        }

        .update_status_btn:hover {
            background: #0040e0;
        }

        .pagination {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .pagination .page-link {
            padding: 8px 16px;
            background: #23233a;
            color: #fff;
            border-radius: 8px;
            margin: 0 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .pagination .page-link.active {
            background: #014bff;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: #1e1e30;
            margin: 5% auto;
            padding: 0;
            width: 90%;
            max-width: 500px;
            border-radius: 20px;
            animation: modalSlideIn 0.3s ease;
            max-height: 85vh;
            overflow-y: auto;
        }

        .modal-large {
            max-width: 800px !important;
        }

        .full-width {
            grid-column: span 2;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            background: #1e1e30;
            z-index: 1;
        }

        .modal-header h2 {
            color: white;
            margin: 0;
        }

        .close {
            color: rgba(255, 255, 255, 0.5);
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s;
        }

        .close:hover {
            color: white;
        }

        .form-group {
            padding: 10px 24px;
        }

        .form-group label {
            display: block;
            color: white;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: #2a2a40;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 14px;
            font-family: Nunito, sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #014bff;
        }

        textarea.form-control {
            resize: vertical;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            padding: 20px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            bottom: 0;
            background: #1e1e30;
        }

        .btn-primary {
            flex: 1;
            padding: 12px;
            background: #014bff;
            color: white;
            border: none;
            border-radius: 100px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: #0040e0;
            transform: translateY(-2px);
        }

        .btn-secondary {
            flex: 1;
            padding: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            border-radius: 100px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        small {
            display: block;
            margin-top: 5px;
            font-size: 12px;
        }

        .tab-content {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <script>
        let currentTab = 'users';
        let currentAppointmentsPage = 1;
        let currentAppointmentsStatus = 'all';
        let currentAppointmentsDate = '';

        function showTab(tabName) {
            currentTab = tabName;
            document.getElementById('usersTab').style.display = tabName === 'users' ? 'block' : 'none';
            document.getElementById('doctorsTab').style.display = tabName === 'doctors' ? 'block' : 'none';
            document.getElementById('positionsTab').style.display = tabName === 'positions' ? 'block' : 'none';
            document.getElementById('serviceCategoriesTab').style.display = tabName === 'service_categories' ? 'block' :
                'none';
            document.getElementById('servicesTab').style.display = tabName === 'services' ? 'block' : 'none';
            document.getElementById('appointmentsTab').style.display = tabName === 'appointments' ? 'block' : 'none';
            document.querySelectorAll('.profile_nav_item').forEach((item, i) => {
                if ((tabName === 'users' && i === 0) || (tabName === 'doctors' && i === 1) || (tabName ===
                        'positions' && i === 2) ||
                    (tabName === 'service_categories' && i === 3) || (tabName === 'services' && i === 4) || (
                        tabName === 'appointments' && i === 5))
                    item.classList.add('active');
                else item.classList.remove('active');
            });
            if (tabName === 'appointments') loadAppointmentsData();
        }

        function loadAppointmentsData(page = 1) {
            const container = document.getElementById('appointmentsTableContainer');
            if (!container) return;
            currentAppointmentsPage = page;
            currentAppointmentsStatus = document.getElementById('appointmentStatusFilter')?.value || 'all';
            currentAppointmentsDate = document.getElementById('appointmentDateFilter')?.value || '';
            container.innerHTML =
                '<div style="text-align: center; padding: 60px;"><div class="loading_spinner"></div> Загрузка записей...</div>';
            let url = `/admin/appointments/data?page=${page}&status=${currentAppointmentsStatus}`;
            if (currentAppointmentsDate) url += `&date=${currentAppointmentsDate}`;
            fetch(url).then(r => r.json()).then(data => {
                if (data.html) {
                    container.innerHTML = data.html;
                    attachAppointmentEvents();
                } else container.innerHTML =
                    '<div style="text-align: center; padding: 60px; color: rgba(255,255,255,0.4);">Ошибка загрузки данных</div>';
            }).catch(() => container.innerHTML =
                '<div style="text-align: center; padding: 60px; color: rgba(255,255,255,0.4);">Ошибка загрузки записей</div>'
                );
        }

        function attachAppointmentEvents() {
            document.querySelectorAll('.update-status-form').forEach(f => {
                f.removeEventListener('submit', handleStatusUpdate);
                f.addEventListener('submit', handleStatusUpdate);
            });
            document.querySelectorAll('.page-link').forEach(l => {
                l.removeEventListener('click', handlePageClick);
                l.addEventListener('click', handlePageClick);
            });
        }

        function handleStatusUpdate(e) {
            e.preventDefault();
            const form = e.target,
                url = form.action,
                formData = new FormData(form);
            const btn = form.querySelector('.update_status_btn'),
                original = btn.innerHTML;
            btn.innerHTML = '<span class="loading_spinner_small"></span> Обновление...';
            btn.disabled = true;
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(r => r.json()).then(data => {
                    showNotification(data.message, 'success');
                    loadAppointmentsData(currentAppointmentsPage);
                }).catch(() => showNotification('Ошибка', 'error'))
                .finally(() => {
                    btn.innerHTML = original;
                    btn.disabled = false;
                });
        }

        function handlePageClick(e) {
            e.preventDefault();
            if (this.dataset.page) loadAppointmentsData(parseInt(this.dataset.page));
        }

        function showNotification(msg, type) {
            const n = document.createElement('div');
            n.style.cssText =
                `position:fixed;top:20px;right:20px;padding:12px 24px;background:${type==='success'?'#00c864':'#ef4444'};color:#fff;border-radius:12px;z-index:10000;cursor:pointer`;
            n.innerHTML = msg;
            n.onclick = () => n.remove();
            document.body.appendChild(n);
            setTimeout(() => n.remove(), 3000);
        }

        function loadPositions() {
            const dept = document.getElementById('doctor_department').value,
                sel = document.getElementById('doctor_position');
            if (!dept) {
                sel.innerHTML = '<option value="">Выберите должность</option>';
                return;
            }
            fetch(`/admin/positions/by-department?department=${encodeURIComponent(dept)}`).then(r => r.json()).then(d => {
                sel.innerHTML = '<option value="">Выберите должность</option>';
                d.forEach(p => {
                    sel.innerHTML += `<option value="${p.id}">${p.name}</option>`;
                });
            }).catch(e => console.error(e));
        }

        function loadPositionsForEdit() {
            const dept = document.getElementById('edit_department').value,
                sel = document.getElementById('edit_position'),
                cur = sel.getAttribute('data-current');
            if (!dept) {
                sel.innerHTML = '<option value="">Выберите должность</option>';
                return;
            }
            fetch(`/admin/positions/by-department?department=${encodeURIComponent(dept)}`).then(r => r.json()).then(d => {
                sel.innerHTML = '<option value="">Выберите должность</option>';
                d.forEach(p => {
                    const selected = (cur == p.id) ? 'selected' : '';
                    sel.innerHTML += `<option value="${p.id}" ${selected}>${p.name}</option>`;
                });
            }).catch(e => console.error(e));
        }

        function openCreateDoctorModal() {
            document.getElementById('createDoctorModal').style.display = 'block';
        }

        function closeCreateDoctorModal() {
            document.getElementById('createDoctorModal').style.display = 'none';
            document.getElementById('createDoctorModal').querySelector('form').reset();
        }

        function editDoctor(id) {
            const form = document.getElementById('editDoctorForm');
            form.action = `/admin/doctors/${id}`;
            fetch(`/admin/doctors/${id}/json`).then(r => r.json()).then(d => {
                document.getElementById('edit_name').value = d.name;
                document.getElementById('edit_specialization').value = d.specialization;
                document.getElementById('edit_department').value = d.department;
                document.getElementById('edit_position').setAttribute('data-current', d.position_id || '');
                document.getElementById('edit_email').value = d.email;
                document.getElementById('edit_phone').value = d.phone || '';
                document.getElementById('edit_price').value = d.price;
                document.getElementById('edit_experience').value = d.experience || '';
                document.getElementById('edit_is_active').value = d.is_active ? '1' : '0';
                document.getElementById('edit_education').value = d.education || '';
                document.getElementById('edit_description').value = d.description || '';
                loadPositionsForEdit();
                document.getElementById('editDoctorModal').style.display = 'block';
            }).catch(e => {
                alert('Ошибка загрузки');
            });
        }

        function closeEditDoctorModal() {
            document.getElementById('editDoctorModal').style.display = 'none';
        }

        function openCreatePositionModal() {
            document.getElementById('createPositionModal').style.display = 'block';
        }

        function closeCreatePositionModal() {
            document.getElementById('createPositionModal').style.display = 'none';
            document.getElementById('createPositionModal').querySelector('form').reset();
        }

        function editPosition(id, name, department, description) {
            document.getElementById('editPositionForm').action = `/admin/positions/${id}`;
            document.getElementById('edit_position_name').value = name;
            document.getElementById('edit_position_department').value = department;
            document.getElementById('edit_position_description').value = description || '';
            document.getElementById('editPositionModal').style.display = 'block';
        }

        function closeEditPositionModal() {
            document.getElementById('editPositionModal').style.display = 'none';
        }

        function openCreateServiceCategoryModal() {
            document.getElementById('createServiceCategoryModal').style.display = 'block';
        }

        function closeCreateServiceCategoryModal() {
            document.getElementById('createServiceCategoryModal').style.display = 'none';
            document.getElementById('createServiceCategoryModal').querySelector('form').reset();
        }

        function editServiceCategory(id, name, department, sortOrder, isActive) {
            document.getElementById('editServiceCategoryForm').action = `/admin/service-categories/${id}`;
            document.getElementById('edit_category_name').value = name;
            document.getElementById('edit_category_department').value = department;
            document.getElementById('edit_category_sort_order').value = sortOrder;
            document.getElementById('edit_category_is_active').value = isActive ? '1' : '0';
            document.getElementById('editServiceCategoryModal').style.display = 'block';
        }

        function closeEditServiceCategoryModal() {
            document.getElementById('editServiceCategoryModal').style.display = 'none';
        }

        function loadCategoriesForService() {
            const dept = document.getElementById('service_department').value,
                sel = document.getElementById('service_category');
            if (!dept) {
                sel.innerHTML = '<option value="">Сначала выберите отделение</option>';
                return;
            }
            sel.innerHTML = '<option value="">Загрузка...</option>';
            fetch(`/admin/categories/by-department?department=${encodeURIComponent(dept)}`).then(r => r.json()).then(d => {
                sel.innerHTML = '<option value="">Выберите вид услуги</option>';
                d.forEach(c => {
                    sel.innerHTML += `<option value="${c.id}">${c.name}</option>`;
                });
            }).catch(e => {
                sel.innerHTML = '<option value="">Ошибка загрузки</option>';
            });
        }

        function loadCategoriesForEditService() {
            const dept = document.getElementById('edit_service_department').value,
                sel = document.getElementById('edit_service_category'),
                cur = sel.getAttribute('data-current');
            if (!dept) {
                sel.innerHTML = '<option value="">Сначала выберите отделение</option>';
                return;
            }
            sel.innerHTML = '<option value="">Загрузка...</option>';
            fetch(`/admin/categories/by-department?department=${encodeURIComponent(dept)}`).then(r => r.json()).then(d => {
                sel.innerHTML = '<option value="">Выберите вид услуги</option>';
                d.forEach(c => {
                    const selected = (cur == c.id) ? 'selected' : '';
                    sel.innerHTML += `<option value="${c.id}" ${selected}>${c.name}</option>`;
                });
            }).catch(e => {
                sel.innerHTML = '<option value="">Ошибка загрузки</option>';
            });
        }

        function openCreateServiceModal() {
            document.getElementById('createServiceModal').style.display = 'block';
            document.getElementById('service_department').value = '';
            document.getElementById('service_category').innerHTML = '<option value="">Сначала выберите отделение</option>';
        }

        function closeCreateServiceModal() {
            document.getElementById('createServiceModal').style.display = 'none';
            document.getElementById('createServiceModal').querySelector('form').reset();
        }

        function editService(id) {
            document.getElementById('editServiceForm').action = `/admin/services/${id}`;
            fetch(`/admin/services/${id}/json`).then(r => r.json()).then(s => {
                document.getElementById('edit_service_name').value = s.name;
                document.getElementById('edit_service_price').value = s.price;
                document.getElementById('edit_service_sort_order').value = s.sort_order;
                document.getElementById('edit_service_is_active').value = s.is_active ? '1' : '0';
                document.getElementById('edit_service_department').value = s.category.department;
                document.getElementById('edit_service_category').setAttribute('data-current', s.category_id);
                loadCategoriesForEditService();
                document.getElementById('editServiceModal').style.display = 'block';
            }).catch(e => {
                alert('Ошибка загрузки');
            });
        }

        function closeEditServiceModal() {
            document.getElementById('editServiceModal').style.display = 'none';
        }
    </script>
@endsection
