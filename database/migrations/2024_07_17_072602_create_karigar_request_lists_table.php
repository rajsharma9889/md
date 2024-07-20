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
        Schema::create('karigar_request_lists', function (Blueprint $table) {
            $table->id();
            $table->text('reason');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('karigar_id');
            $table->foreign('karigar_id')->on('karigars')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('form_id')->on('submited_forms')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karigar_request_lists');
    }
};
