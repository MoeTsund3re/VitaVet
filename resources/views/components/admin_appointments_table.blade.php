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
                        <form method="POST" action="{{ route('admin.appointments.update-status', $appointment->id) }}"
                            class="update-status-form" style="display: flex; gap: 8px; align-items: center;">
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
        @for ($i = 1; $i <= $appointments->lastPage(); $i++)
            <a href="#" class="page-link {{ $i == $appointments->currentPage() ? 'active' : '' }}"
                data-page="{{ $i }}">{{ $i }}</a>
        @endfor
    </div>
@endif
