<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submited_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('colors')->nullable();
            $table->string('dandis')->nullable();
            $table->string('gaze_sizes')->nullable();
            $table->string('genders')->nullable();
            $table->string('kundas')->nullable();
            $table->string('latkans')->nullable();
            $table->string('purities')->nullable();
            $table->string('sizes')->nullable();
            $table->string('weights')->nullable();
            $table->enum('status', [0, 1, 2])->default(0);
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submited_forms');
    }
};
