<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communicationlogs', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('logueable_id')->unsigned()->index()->nullable();
            $table->string("logueable_type");
            $table->text("mensaje");
            $table->string("topico");
            $table->dateTime("fechaEnvio")->nullable();
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
        Schema::dropIfExists('communicationlogs');
    }
}
