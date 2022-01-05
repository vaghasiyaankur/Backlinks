<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInSpotListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spot_lists', function (Blueprint $table) {
            $table->string('trafic')->nullable();
            $table->string('gnews')->nullable();
            $table->string('thematic')->nullable();
            $table->string('provider')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spot_lists', function (Blueprint $table) {
             $table->dropColumn('trafic');
             $table->dropColumn('gnews');
             $table->dropColumn('thematic');
             $table->dropColumn('provider');
        });
    }
}
