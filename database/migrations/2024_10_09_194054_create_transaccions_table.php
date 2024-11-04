<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('comercio_id')->unique();
            $table->foreign('comercio_id')->references('id')
                ->on('comercios')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
            $table->unsignedBigInteger('cliente_id')->unique();
            $table->foreign('cliente_id')->references('id')
                ->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');            
            $table->string('paymentId')->nullable();
            $table->string('codigoFactura')->nullable();
            $table->string('metodo')->nullable();
            $table->string('currency');
            $table->string('banco')->nullable();
            $table->string('codigo')->nullable();
            $table->string('reference')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('identificationNac')->nullable();
            $table->string('identificationNumber')->nullable();
            $table->string('cellphonecode')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('rifLetter')->nullable();
            $table->string('rifNumber')->nullable();
            $table->string('fechaPago')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('status')->nullable()->default('notconfirmed');
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
        Schema::dropIfExists('transaccions');
    }
}
