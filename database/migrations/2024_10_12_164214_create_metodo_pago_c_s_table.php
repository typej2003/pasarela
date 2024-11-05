<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodoPagoCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodo_pago_c_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('comercio_id');
            $table->string('metodopago');
            $table->string('tipocuenta')->nullable();
            $table->string('moneda')->nullable();
            $table->string('marcaInternaciona')->nullable();
            $table->string('nrocuenta')->nullable();
            $table->string('ccv-cvv')->nullable();
            $table->date('fechavencimiento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('titular')->nullable();
            $table->string('tipodocumento')->nullable()->default('V');
            $table->string('documento')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('pagoonline')->nullable();
            $table->string('email')->nullable();
            $table->string('exchange')->nullable();
            $table->string('exchangeaddress')->nullable();
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
        Schema::dropIfExists('metodo_pago_c_s');
    }
}
