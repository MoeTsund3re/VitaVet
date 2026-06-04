@extends('layouts.app')

@section('content')
    <style>
        .admin_appointments {
            max-width: 1400px;
            margin: 0 auto;
            padding: 160px 60px 80px;
        }

        .admin_header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .admin_title {
            font-size: 32px;
            font-weight: 800;
            color: #fff;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        th {
            font-size: 13px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            font-size: 14px;
            color: #fff;
        }

        .status_badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
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
        }

        .pagination .page-link {
            padding: 8px 16px;
            background: #23233a;
            color: #fff;
            border-radius: 8px;
            margin: 0 4px;
            text-decoration: none;
        }
    </style>

    <div class="admin_appointments">
        <div class="admin_header">
            <h1 class="admin_title">Управление записями</h1>
            <div class="filters">
                <select class="filter_select" id="statusFilter" onchange="applyFilters()">
                    <option value="all">Все статусы</option>
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>
                            {{ $label }}</option>
                    @endforeach
                </select>
                <input type="date" class="filter_date" id="dateFilter" value="{{ request('date') }}"
                    onchange="applyFilters()">
            </div>
        </div>

        <div class="appointments_table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Клиент</th>
                        <th>Питомец</th>
                        <th>Услуга</th>
                        <th>Врач</th>
                        <th>Дата и время</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>#{{ $appointment->id }}</td>
                            <td>{{ $appointment->user->name }}<br><small
                                    style="color:rgba(255,255,255,0.4)">{{ $appointment->user->email }}</small></td>
                            <td>{{ $appointment->pet->name }}<br><small
                                    style="color:rgba(255,255,255,0.4)">{{ $appointment->pet->type_ru }}</small></td>
                            <td>{{ $appointment->service->name }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->appointment_date->format('d.m.Y') }}<br><small
                                    style="color:rgba(255,255,255,0.4)">{{ $appointment->appointment_time }}</small></td>
                            <td>
                                <form method="POST"
                                    action="{{ route('admin.appointments.update-status', $appointment->id) }}"
                                    style="display: flex; gap: 8px; align-items: center;">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="status_select">
                                        @foreach ($statuses as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ $appointment->status == $value ? 'selected' : '' }}>{{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="update_status_btn">Обновить</button>
                                </form>
                            </td>
                            <td>
                                @if ($appointment->status == 'cancelled' && $appointment->cancellation_reason)
                                    <span title="{{ $appointment->cancellation_reason }}" style="cursor: help;">⚠️</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 60px; color: rgba(255,255,255,0.4);">
                                Записей не найдено
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (method_exists($appointments, 'links'))
            <div class="pagination">
                {{ $appointments->links() }}
            </div>
        @endif
    </div>

    <script>
        function applyFilters() {
            const status = document.getElementById('statusFilter').value;
            const date = document.getElementById('dateFilter').value;
            let url = '{{ route('admin.appointments.index') }}';
            let params = [];
            if (status && status !== 'all') params.push(`status=${status}`);
            if (date) params.push(`date=${date}`);
            if (params.length) url += '?' + params.join('&');
            window.location.href = url;
        }
    </script>
@endsection
