<?php
// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Pet;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    // Получить доступные временные слоты для врача в указанную дату
    public function getAvailableTimes(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $doctorId = $request->doctor_id;
        $date = $request->date;

        // Рабочие часы: с 9:00 до 21:00
        $startHour = 9;
        $endHour = 21;
        $interval = 60; // минут между приёмами

        $allTimes = [];
        for ($hour = $startHour; $hour < $endHour; $hour++) {
            $allTimes[] = sprintf('%02d:00', $hour);
            $allTimes[] = sprintf('%02d:30', $hour);
        }

        // Получаем уже занятые слоты
        $bookedTimes = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_date', $date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('appointment_time')
            ->toArray();

        $availableTimes = array_diff($allTimes, $bookedTimes);

        return response()->json([
            'available_times' => array_values($availableTimes)
        ]);
    }

    // Создание записи
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'doctor_id' => 'required|exists:doctors,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string|max:500',
        ]);

        // Проверяем, что питомец принадлежит пользователю
        $pet = Pet::where('id', $request->pet_id)
            ->where('user_id', auth()->id())
            ->where('is_active', true)
            ->firstOrFail();

        // Проверяем, что услуга существует и активна
        $service = Service::where('id', $request->service_id)
            ->where('is_active', true)
            ->firstOrFail();

        // Проверяем, что врач существует и активен
        $doctor = Doctor::where('id', $request->doctor_id)
            ->where('is_active', true)
            ->firstOrFail();

        // Проверяем, что услуга соответствует отделению врача
        $serviceCategory = ServiceCategory::find($service->category_id);
        if ($serviceCategory->department !== $doctor->department) {
            return response()->json([
                'success' => false,
                'message' => 'Выбранный врач не оказывает данную услугу'
            ], 422);
        }

        // Проверяем, что слот свободен
        $existingAppointment = Appointment::where('doctor_id', $doctor->id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($existingAppointment) {
            return response()->json([
                'success' => false,
                'message' => 'Это время уже занято. Пожалуйста, выберите другое время.'
            ], 422);
        }

        // Создаём запись
        $appointment = Appointment::create([
            'user_id' => auth()->id(),
            'pet_id' => $pet->id,
            'doctor_id' => $doctor->id,
            'service_id' => $service->id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => Appointment::STATUS_PENDING,
            'notes' => $request->notes,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Запись успешно создана! Ожидайте подтверждения от администратора.',
            'appointment' => $appointment
        ]);
    }

    // Мои записи (для пользователя)
    public function myAppointments()
    {
        $appointments = Appointment::with(['pet', 'doctor', 'service'])
            ->where('user_id', auth()->id())
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('pages.my_appointments', compact('appointments'));
    }

    // Отмена записи пользователем
    public function cancel(Request $request, $id)
    {
        $appointment = Appointment::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if (!in_array($appointment->status, ['pending', 'confirmed'])) {
            return response()->json([
                'success' => false,
                'message' => 'Эту запись уже нельзя отменить'
            ], 422);
        }

        $appointment->update([
            'status' => Appointment::STATUS_CANCELLED,
            'cancelled_at' => now(),
            'cancellation_reason' => $request->reason ?? 'Отменено пользователем'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Запись успешно отменена'
        ]);
    }

    // Админ панель - все записи
    public function adminIndex(Request $request)
    {
        $query = Appointment::with(['user', 'pet', 'doctor', 'service']);

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->date) {
            $query->where('appointment_date', $request->date);
        }

        $appointments = $query->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->paginate(20);

        $statuses = Appointment::getStatuses();

        return view('pages.admin_appointments', compact('appointments', 'statuses'));
    }

    // Обновление статуса записи (админ)
    // Обновление статуса записи (админ)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', Rule::in(array_keys(Appointment::getStatuses()))],
            'cancellation_reason' => 'required_if:status,cancelled|nullable|string|max:500'
        ],[
            'cancellation_reason' => 'Должна быть объяснена причина отмены'
        ]);

        $appointment = Appointment::findOrFail($id);

        $data = ['status' => $request->status];

        if ($request->status === Appointment::STATUS_CANCELLED && !$appointment->cancelled_at) {
            $data['cancelled_at'] = now();
            $data['cancellation_reason'] = $request->cancellation_reason;
        }

        $appointment->update($data);

        // Если запрос через AJAX, возвращаем JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Статус записи успешно обновлён'
            ]);
        }

        return redirect()->back()->with('success', 'Статус записи успешно обновлён');
    }
    // Получить записи для конкретного питомца (для профиля питомца)
    public function getPetAppointments($petId)
    {
        $pet = Pet::where('id', $petId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Все записи для этого питомца
        $appointments = Appointment::with(['doctor', 'service'])
            ->where('pet_id', $petId)
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->get();

        // Завершённые (история)
        $completedAppointments = $appointments->whereIn('status', ['completed', 'cancelled']);

        // Активные записи (предстоящие)
        $upcomingAppointments = $appointments->whereIn('status', ['pending', 'confirmed'])
            ->filter(function ($app) {
                return $app->appointment_date >= now()->toDateString();
            });

        // Статистика
        $totalVisits = $completedAppointments->count();
        $upcomingCount = $upcomingAppointments->count();

        // Последний визит
        $lastVisit = $completedAppointments->first();

        // Ближайший приём
        $nextAppointment = $upcomingAppointments->sortBy('appointment_date')->first();

        // Форматирование истории
        $visitHistory = [];
        foreach ($completedAppointments as $app) {
            $date = \Carbon\Carbon::parse($app->appointment_date);
            $visitHistory[] = [
                'day' => $date->format('d'),
                'month' => $this->getMonthShort($date->month),
                'service' => $app->service->name,
                'doctor' => $app->doctor->name,
                'status_ru' => $app->status_ru,
                'status_class' => $this->getStatusClass($app->status)
            ];
        }

        // Форматирование предстоящих приёмов
        $upcomingList = [];
        foreach ($upcomingAppointments as $app) {
            $date = \Carbon\Carbon::parse($app->appointment_date);
            $upcomingList[] = [
                'day' => $date->format('d'),
                'month' => $this->getMonthShort($date->month),
                'service' => $app->service->name,
                'doctor' => $app->doctor->name,
                'time' => $app->appointment_time,
                'status_ru' => $app->status_ru,
                'status_class' => $this->getStatusClass($app->status)
            ];
        }

        return response()->json([
            'total_visits' => $totalVisits,
            'upcoming_count' => $upcomingCount,
            'last_visit' => $lastVisit ? [
                'date' => \Carbon\Carbon::parse($lastVisit->appointment_date)->format('d M Y'),
                'service' => $lastVisit->service->name
            ] : null,
            'next_appointment' => $nextAppointment ? [
                'service' => $nextAppointment->service->name,
                'doctor' => $nextAppointment->doctor->name,
                'date' => $nextAppointment->appointment_date,
                'date_formatted' => \Carbon\Carbon::parse($nextAppointment->appointment_date)->format('d M Y'),
                'time' => $nextAppointment->appointment_time
            ] : null,
            'visit_history' => $visitHistory,
            'upcoming_appointments' => $upcomingList
        ]);
    }

    private function getMonthShort($month)
    {
        $months = [
            1 => 'Янв',
            2 => 'Фев',
            3 => 'Мар',
            4 => 'Апр',
            5 => 'Май',
            6 => 'Июн',
            7 => 'Июл',
            8 => 'Авг',
            9 => 'Сен',
            10 => 'Окт',
            11 => 'Ноя',
            12 => 'Дек'
        ];
        return $months[$month] ?? '';
    }

    private function getStatusClass($status)
    {
        return match ($status) {
            'completed' => 'tag_green',
            'confirmed' => 'tag_blue',
            'pending' => 'tag_orange',
            'cancelled' => 'tag_red',
            default => 'tag_gray'
        };
    }
    // Получить данные записей для AJAX (админка)
    public function getAppointmentsData(Request $request)
    {
        $query = Appointment::with(['user', 'pet', 'doctor', 'service']);

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->date) {
            $query->where('appointment_date', $request->date);
        }

        $appointments = $query->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->paginate(15);

        $statuses = Appointment::getStatuses();

        $html = view('components.admin_appointments_table', compact('appointments', 'statuses'))->render();

        return response()->json(['html' => $html]);
    }
}
