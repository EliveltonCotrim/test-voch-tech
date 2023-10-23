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
        Schema::create('cargo_colaboradors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('colaborador_id')->constrained()->cascadeOnDelete();
            $table->integer('nota_desempenho');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_colaboradors');
    }
};
