<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('image');
            $table->enum('gender', [0, 1, 2])->nullable();
            $table->enum('purity', [0, 1, 2])->nullable();
            $table->enum('color', [0, 1, 2])->nullable();
            $table->enum('dandi', [0, 1, 2])->nullable();
            $table->enum('size', [0, 1, 2])->nullable();
            $table->enum('gaze_size', [0, 1, 2])->nullable();
            $table->enum('weight', [0, 1, 2])->nullable();
            $table->enum('kunda', [0, 1, 2])->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
