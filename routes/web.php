<?php
// routes/web.php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

// ── Публичные страницы ──────────────────────────────────────────────────────
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/promotions', [PageController::class, 'promotions'])->name('promotions');
Route::get('/dermatologia', [PageController::class, 'dermatologia'])->name('dermatologia');
Route::get('/diagnostika', [PageController::class, 'diagnostika'])->name('diagnostika');
Route::get('/hirurgiya', [PageController::class, 'hirurgiya'])->name('hirurgiya');
Route::get('/kardiologiya', [PageController::class, 'kardiologiya'])->name('kardiologiya');
Route::get('/oftalmologiya', [PageController::class, 'oftalmologiya'])->name('oftalmologiya');
Route::get('/onkologiya', [PageController::class, 'onkologiya'])->name('onkologiya');
Route::get('/stomatologiya', [PageController::class, 'stomatologiya'])->name('stomatologiya');
Route::get('/terapiya', [PageController::class, 'terapiya'])->name('terapiya');
Route::get('/travmatologiya', [PageController::class, 'travmatologiya'])->name('travmatologiya');
Route::get('/neurologiya', [PageController::class, 'neurologiya'])->name('neurologiya');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// ── Аутентификация ──────────────────────────────────────────────────────────
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ── Профиль пользователя (только для авторизованных) ─────────────────────────
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
});

// ── Админ панель (только для админов) ────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [PageController::class, 'admin'])->name('dashboard');
    Route::get('/dashboard', [PageController::class, 'admin'])->name('page');
});

// Маршрут для админ панели (без префикса для обратной совместимости)
Route::middleware(['auth', 'admin'])->get('/admin_page', [PageController::class, 'admin'])->name('admin_page');

// ── Управление должностями (только для админов) ─────────────────────────────
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/positions/store', [PageController::class, 'storePosition'])->name('admin.positions.store');
    Route::put('/admin/positions/{id}', [PageController::class, 'updatePosition'])->name('admin.positions.update');
    Route::delete('/admin/positions/{id}', [PageController::class, 'destroyPosition'])->name('admin.positions.destroy');
    Route::get('/admin/positions/by-department', [PageController::class, 'getPositionsByDepartment'])->name('admin.positions.by-department');
});

// Управление врачами
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/doctors/store', [PageController::class, 'storeDoctor'])->name('admin.doctors.store');
    Route::put('/admin/doctors/{id}', [PageController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/admin/doctors/{id}', [PageController::class, 'destroyDoctor'])->name('admin.doctors.destroy');
    Route::get('/admin/doctors/{id}/json', [PageController::class, 'getDoctorJson'])->name('admin.doctors.json');
});

// Публичная страница врача
Route::get('/doctor/{id}', [PageController::class, 'doctorProfile'])->name('doctor.public');

// Личный кабинет врача
Route::middleware(['auth', 'doctor'])->prefix('doctor')->group(function () {
    Route::get('/', [PageController::class, 'doctor'])->name('doctor');
});
// Управление категориями услуг
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/service-categories/store', [PageController::class, 'storeServiceCategory'])->name('admin.service-categories.store');
    Route::put('/admin/service-categories/{id}', [PageController::class, 'updateServiceCategory'])->name('admin.service-categories.update');
    Route::delete('/admin/service-categories/{id}', [PageController::class, 'destroyServiceCategory'])->name('admin.service-categories.destroy');
    Route::get('/admin/service-categories/{id}/json', [PageController::class, 'getServiceCategoryJson'])->name('admin.service-categories.json');
    Route::get('/admin/service-categories/by-department', [PageController::class, 'getServiceCategories'])->name('admin.service-categories.by-department');
});

// Управление услугами
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/services/store', [PageController::class, 'storeService'])->name('admin.services.store');
    Route::put('/admin/services/{id}', [PageController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [PageController::class, 'destroyService'])->name('admin.services.destroy');
    Route::get('/admin/services/{id}/json', [PageController::class, 'getServiceJson'])->name('admin.services.json');
    Route::get('/admin/services/by-category', [PageController::class, 'getServicesByCategory'])->name('admin.services.by-category');
    Route::get('/admin/categories/by-department', [PageController::class, 'getCategoriesByDepartment'])->name('admin.categories.by-department');
});
// Управление питомцами
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/pets/create', [PageController::class, 'createPet'])->name('pets.create');
    Route::post('/profile/pets/store', [PageController::class, 'storePet'])->name('pets.store');
    Route::get('/profile/pets/{id}/edit', [PageController::class, 'editPet'])->name('pets.edit');
    Route::put('/profile/pets/{id}', [PageController::class, 'updatePet'])->name('pets.update');
    Route::delete('/profile/pets/{id}', [PageController::class, 'destroyPet'])->name('pets.destroy');
    Route::get('/profile/pets/json', [PageController::class, 'getPets'])->name('pets.json');
});
// После маршрутов для питомцев добавьте:
Route::middleware(['auth'])->group(function () {
    Route::get('/pet/{id}', [PageController::class, 'petProfile'])->name('pet.profile');
});

// Записи на приём
Route::middleware(['auth'])->group(function () {
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/available-times', [AppointmentController::class, 'getAvailableTimes'])->name('appointments.available-times');
    Route::get('/appointments/my', [AppointmentController::class, 'myAppointments'])->name('appointments.my');
    Route::patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
});

// Админ управление записями
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/appointments', [AppointmentController::class, 'adminIndex'])->name('appointments.index');
    Route::patch('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.update-status');
});
Route::get('/api/doctors/by-department', [DoctorController::class, 'getByDepartment']);
Route::middleware(['auth'])->group(function () {
    Route::get('/api/pet/{id}/appointments', [AppointmentController::class, 'getPetAppointments'])->name('api.pet.appointments');
});
// Добавьте в конец файла
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/appointments/data', [AppointmentController::class, 'getAppointmentsData'])->name('admin.appointments.data');
});
