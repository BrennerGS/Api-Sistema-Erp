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
        Schema::create('kits', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->timestamps();
        });
    
        Schema::create('kit_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kit_id')->constrained('kits');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kit_produto'); 
        Schema::dropIfExists('kits'); 
    }
};
