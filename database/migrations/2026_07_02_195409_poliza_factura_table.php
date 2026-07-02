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
        Schema::create('poliza_factura', function (Blueprint $table) {
            $table->string('poliza',50);
            $table->uuid('uuid');
            $table->decimal('total',10,2);
            $table->timestamps();
            $table->primary(['poliza', 'uuid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poliza_factura');
    }
};
