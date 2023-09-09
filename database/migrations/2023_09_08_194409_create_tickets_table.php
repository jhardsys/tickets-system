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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->enum('priority', ['baja', 'media', 'alta'])->default('baja');
            $table->enum('status', ['derivación al area especializada', 'en proceso', 'resuelto'])
                ->default('derivación al area especializada');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('agent_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
