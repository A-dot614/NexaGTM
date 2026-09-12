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
        Schema::create('call_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('call_type'); // 'video' or 'voice'
            $table->date('date');
            $table->string('time_slot');
            $table->string('timezone');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('topic')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_bookings');
    }
};
