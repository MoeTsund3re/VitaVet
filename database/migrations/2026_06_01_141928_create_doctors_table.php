<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialization');
            $table->string('department');
            $table->foreignId('position_id')->nullable()->constrained('positions')->onDelete('set null');
            $table->string('photo')->nullable();
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->integer('experience')->nullable(); // лет опыта
            $table->json('education')->nullable(); // образование
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('department');
            $table->index('position_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
