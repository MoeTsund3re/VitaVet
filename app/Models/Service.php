<?php
// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Связь с категорией
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    // Получить активные услуги для категории
    public static function getActiveByCategory($categoryId)
    {
        return self::where('category_id', $categoryId)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }
}
