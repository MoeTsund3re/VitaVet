<?php
// app/Models/Position.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'description',
    ];

    // Связь с врачами
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public static function getDepartments()
    {
        return [
            'Хирургия',
            'Терапия',
            'Диагностика',
            'Неврология',        
            'Стоматология',
            'Онкология',
            'Дерматология',
            'Офтальмология',
            'Травматология',
            'Кардиология',
        ];
    }

    // Проверить, существует ли отделение
    public static function isValidDepartment($department)
    {
        return in_array($department, self::getDepartments());
    }
}
