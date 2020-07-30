<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCityClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('city_client')) {
            Schema::table('city_client', function (Blueprint $table) {
                $table->dropForeign(['city_id']);
                $table->dropForeign(['client_id']);
            });
            Schema::drop('city_client');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
