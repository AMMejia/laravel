<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('salon')->nullable();
            $table->string('cliente')->nullable();
            $table->string('gte_de_gpos')->nullable();
            $table->string('pax')->nullable();
            $table->string('montaje')->nullable();
            $table->string('notas')->nullable();
            $table->decimal('equipment')->nullable();
            $table->decimal('operation')->nullable();
            $table->decimal('entertainment')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('final')->nullable();
            $table->decimal('iva')->nullable();
            $table->date('start')->nullable();
            $table->json('color')->nullable();
            $table->boolean('draggable')->default(true)->nullable();
            $table->json('resizable')->nullable();
            $table->json('products')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('costo_unitario')->nullable();
            $table->json('flete')->nullable();
            $table->decimal('mano_de_obra')->nullable();
            $table->string('hotel')->nullable();
            $table->decimal('comision')->nullable();
            $table->decimal('comisionFinal')->nullable();
            $table->json('coordinacion')->nullable();
            $table->decimal('ctoOperacion')->nullable();
            $table->json('entretenimiento')->nullable();
            $table->decimal('finalDlrs')->nullable();
            $table->string('group')->nullable();
            $table->decimal('ivaDlrs')->nullable();
            $table->decimal('ivaFinal')->nullable();
            $table->decimal('mn')->nullable();
            $table->json('proveedores')->nullable();
            $table->decimal('subEntretainment')->nullable();
            $table->decimal('subEquipment')->nullable();
            $table->decimal('subOperacion')->nullable(); 
            $table->decimal('subTotalDlrs')->nullable();
            $table->decimal('subtotalFinal')->nullable(); 
            $table->decimal('totalDlrs')->nullable(); 
            $table->decimal('totalIvaFinal')->nullable();
            $table->decimal('utilidad')->nullable();
            $table->json('workforce')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->decimal('cambio')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('events');
    }
}
