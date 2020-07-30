<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_municipality', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('municipality_id')->unsigned();

            $table->foreign('client_id')
                ->references('id')->on('clients');

            $table->foreign('municipality_id')
                ->references('id')->on('municipalities');
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
        Schema::dropIfExists('client_municipality');
    }
}
