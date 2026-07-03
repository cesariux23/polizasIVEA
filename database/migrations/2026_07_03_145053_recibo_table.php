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
        //
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->string('poliza',50);
            $table->string('RFCEmisor',50);
            $table->string('NombreEmisor',100);
            $table->date('Fecha');
            $table->decimal('Total',10,2);
            $table->string('Descripcion',100);
            $table->string('UUID',50)->nullable()->Default('RECIBO SIMPLE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('recibos');
    }
};
