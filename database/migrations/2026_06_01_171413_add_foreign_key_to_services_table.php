<?php
// database/migrations/2026_06_01_200000_add_foreign_key_to_services_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Добавляем внешний ключ, если его еще нет
        Schema::table('services', function (Blueprint $table) {
            // Проверяем, существует ли колонка category_id
            if (!Schema::hasColumn('services', 'category_id')) {
                $table->unsignedBigInteger('category_id')->after('id');
            }

            // Добавляем внешний ключ
            $table->foreign('category_id')
                ->references('id')
                ->on('service_categories')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};
