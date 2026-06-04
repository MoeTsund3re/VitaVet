@extends('layouts.app')

@section('content')
    <style>
        .appointments_page {
            max-width: 1400px;
            margin: 0 auto;
            padding: 120px 60px 80px;
        }

        .appointments_title {
            font-size: 36px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }

        .appointments_sub {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 40px;
        }

        .appointment_card {
            background: #23233a;
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            transition: transform 0.2s;
        }

        .appointment_card:hover {
            transform: translateY(-2px);
        }

        .appointment_info {
            flex: 1;
        }

        .appointment_service {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
        }

        .appointment_details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
        }

        .appointment_details span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .appointment_status {
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
        }

        .cancel_btn {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: none;
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .cancel_btn:hover {
            background: rgba(239, 68, 68, 0.25);
            transform: translateY(-1px);
        }

        .empty_state {
            text-align: center;
            padding: 80px;
            background: #23233a;
            border-radius: 30px;
        }

        .empty_state_icon {
            font-size: 64px;
            margin-bottom: 20px;
        }

        .empty_state_title {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }

        .empty_state_text {
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 30px;
        }

        .book_btn {
            display: inline-block;
            background: #014bff;
            color: #fff;
            padding: 12px 32px;
            border-radius: 100px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }

        .book_btn:hover {
            background: #0040e0;
            transform: translateY(-2px);
        }
    </style>

    <div class="appointments_page">
        <h1 class="appointments_title">Мои записи</h1>
        <p class="appointments_sub">История всех ваших записей на приём</p>

        @if ($appointments->count() > 0)
            @foreach ($appointments as $appointment)
                <div class="appointment_card">
                    <div class="appointment_info">
                        <div class="appointment_service">{{ $appointment->service->name }}</div>
                        <div class="appointment_details">
                            <span>🐾 {{ $appointment->pet->name }}</span>
                            <span>👨‍⚕️ {{ $appointment->doctor->name }}</span>
                            <span>📅 {{ $appointment->appointment_date->format('d.m.Y') }}</span>
                            <span>🕐 {{ $appointment->appointment_time }}</span>
                        </div>
                    </div>
                    <div class="appointment_status"
                        style="background: {{ $appointment->status_color }}20; color: {{ $appointment->status_color }}">
                        {{ $appointment->status_ru }}
                    </div>
                    @if (in_array($appointment->status, ['pending', 'confirmed']))
                        <button class="cancel_btn" onclick="cancelAppointment({{ $appointment->id }})">Отменить</button>
                    @endif
                </div>
            @endforeach
        @else
            <div class="empty_state">
                <div class="empty_state_icon">📅</div>
                <div class="empty_state_title">У вас пока нет записей</div>
                <div class="empty_state_text">Запишитесь на приём к врачу онлайн</div>
                <a href="{{ route('services') }}" class="book_btn">Записаться на приём</a>
            </div>
        @endif
    </div>

    <script>
        function cancelAppointment(id) {
            if (!confirm('Вы уверены, что хотите отменить эту запись?')) return;

            fetch(`/appointments/${id}/cancel`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        reason: 'Отменено пользователем'
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(() => alert('Произошла ошибка'));
        }
    </script>
@endsection
