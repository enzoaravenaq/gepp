<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelResultsExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level__results__executions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_level_execution');
            $table->unsignedBigInteger('id_activities_results');
            $table->string('estado_resultado');
            $table->string('comentario_resultado', 500)->nullable();
            $table->dateTime('deleted')->nullable();
            $table->timestamps();


            $table->foreign('id_level_execution')->references('id')->on('test__level__executions');
            $table->foreign('id_activities_results')->references('id')->on('level__activities__results');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level__results__executions');
    }
}
