<?php
// app/Models/Appointment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'doctor_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes',
        'cancelled_at',
        'cancellation_reason',
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time' => 'string',
        'cancelled_at' => 'datetime',
    ];

    // Связи
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Статусы
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'Ожидает подтверждения',
            self::STATUS_CONFIRMED => 'Подтверждён',
            self::STATUS_COMPLETED => 'Завершён',
            self::STATUS_CANCELLED => 'Отменён',
        ];
    }

    public function getStatusRuAttribute()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            self::STATUS_PENDING => '#f59e0b',
            self::STATUS_CONFIRMED => '#10b981',
            self::STATUS_COMPLETED => '#3b82f6',
            self::STATUS_CANCELLED => '#ef4444',
            default => '#6b7280',
        };
    }
}
