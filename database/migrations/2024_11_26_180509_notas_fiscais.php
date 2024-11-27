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
        Schema::create('notas_fiscais', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('tipo');
            $table->decimal('valor', 8, 2);
            $table->timestamps();
        });
    
        Schema::create('nota_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_fiscal_id')->constrained('notas_fiscais');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->timestamps();
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_produto'); 
        Schema::dropIfExists('notas_fiscais'); 
    }
};
