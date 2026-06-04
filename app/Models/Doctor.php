<?php
// app/Models/Doctor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'department',
        'position_id',
        'photo',
        'price',
        'description',
        'email',
        'phone',
        'experience',
        'education',
        'is_active',
    ];

    protected $casts = [
        'education' => 'array',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Связь с должностью
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Получить список врачей по отделению
    public static function getByDepartment($department)
    {
        return self::where('department', $department)->where('is_active', true)->get();
    }

    // Получить фото или дефолтную
    public function getPhotoUrlAttribute()
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        return asset('assets/images/default_doctor.png');
    }
}
