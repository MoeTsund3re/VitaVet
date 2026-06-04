<?php
// app/Models/Pet.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'emoji',
        'type',
        'breed',
        'gender',
        'birth_date',
        'weight',
        'color',
        'chip_number',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'weight' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Получить возраст питомца
    public function getAgeAttribute()
    {
        if (!$this->birth_date) {
            return 'Не указан';
        }
        $age = $this->birth_date->diffInYears(now());
        if ($age == 0) {
            $months = $this->birth_date->diffInMonths(now());
            return $months . ' ' . $this->getMonthDeclension($months);
        }
        return $age . ' ' . $this->getYearDeclension($age);
    }

    private function getYearDeclension($years)
    {
        $years = $years % 100;
        if ($years > 20)
            $years %= 10;
        if ($years == 1)
            return 'год';
        if ($years >= 2 && $years <= 4)
            return 'года';
        return 'лет';
    }

    private function getMonthDeclension($months)
    {
        $months = $months % 100;
        if ($months > 20)
            $months %= 10;
        if ($months == 1)
            return 'месяц';
        if ($months >= 2 && $months <= 4)
            return 'месяца';
        return 'месяцев';
    }

    // Получить тип на русском
    public function getTypeRuAttribute()
    {
        return [
            'cat' => 'Кошка',
            'dog' => 'Собака',
            'rabbit' => 'Кролик',
            'rodent' => 'Грызун',
            'bird' => 'Птица',
            'reptile' => 'Рептилия',
            'fish' => 'Рыба',
            'other' => 'Другое',
        ][$this->type] ?? 'Другое';
    }

    // Получить пол на русском
    public function getGenderRuAttribute()
    {
        $genders = [
            'male' => 'Кот',
            'female' => 'Кошка',
            'castrated_male' => 'Кастрированный кот',
            'spayed_female' => 'Стерилизованная кошка',
            'male_dog' => 'Кобель',
            'female_dog' => 'Сука',
            'castrated_dog' => 'Кастрированный кобель',
            'spayed_dog' => 'Стерилизованная сука',
        ];
        return $genders[$this->gender] ?? 'Не указан';
    }
}
