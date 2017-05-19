<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre");
            $table->string("client_mqtt_id")->unique();
            $table->string("tipo")->default("semaforo");
            $table->ipAddress("ip");
            $table->macAddress("mac")->default("");
            $table->boolean("activo")->default(true);
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
        Schema::dropIfExists('nodos');
    }
}
