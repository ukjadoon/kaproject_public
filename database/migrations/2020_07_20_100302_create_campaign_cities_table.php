<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_city', function (Blueprint $table) {
            $table->bigInteger('campaign_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();

            $table->foreign('campaign_id')
                ->references('id')->on('campaigns')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
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
        Schema::dropIfExists('campaign_city');
    }
}
