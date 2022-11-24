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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('unidad');
            $table->integer('creado')->default(0);
            $table->float('precio', 12, 2);
            $table->float('cantidad', 12, 2);
            $table->float('total', 12, 2);
            $table->decimal('tasa_cambio', 12, 2);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('compra_id')->constrained();
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
        Schema::dropIfExists('detalle_compras');
    }
};