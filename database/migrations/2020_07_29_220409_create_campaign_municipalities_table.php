<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_municipality', function (Blueprint $table) {
            $table->bigInteger('campaign_id')->unsigned();
            $table->bigInteger('municipality_id')->unsigned();

            $table->foreign('campaign_id')
                ->references('id')->on('campaigns');

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
        Schema::dropIfExists('campaign_municipality');
    }
}
