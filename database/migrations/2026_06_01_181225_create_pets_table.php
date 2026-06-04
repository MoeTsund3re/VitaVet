<?php
// database/migrations/2026_06_02_000001_create_pets_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('emoji')->default('🐱');
            $table->enum('type', ['cat', 'dog', 'rabbit', 'rodent', 'bird', 'reptile', 'fish', 'other'])->default('cat');
            $table->string('breed')->nullable();
            $table->enum('gender', ['male', 'female', 'castrated_male', 'spayed_female', 'male_dog', 'female_dog', 'castrated_dog', 'spayed_dog'])->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('color')->nullable();
            $table->string('chip_number')->nullable()->unique();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
