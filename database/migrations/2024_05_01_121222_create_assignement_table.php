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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offers_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('partner_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('accepted')->default(0);
            $table->unique('offers_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignement');
    }
};
