<?php
// app/Models/ServiceCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_categories';

    protected $fillable = [
        'name',
        'department',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Связь с услугами (будет использоваться позже)
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    // Получить активные категории для отделения
    public static function getActiveByDepartment($department)
    {
        return self::where('department', $department)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    // Получить все отделения
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
}
