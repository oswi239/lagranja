<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_compra', 15, 2);
            $table->integer('items');
            $table->foreignId('user_id')->constrained();
            $table->enum('forma_pago', ['contado', 'credito'])->default('contado');

            $table->dateTime('f_inicio');
            $table->dateTime('f_final');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};