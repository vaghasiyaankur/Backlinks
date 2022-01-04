<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot_lists', function (Blueprint $table) {
            $table->id();
            $table->String('spot')->nullable();
            $table->Integer('prix')->nullable();
            $table->String('profile_facebook')->nullable();
            $table->Integer('ref_domain')->nullable();
            $table->Integer('trust_flow')->nullable();
            $table->Integer('citation_flow')->nullable();
            $table->Integer('majestic_flow')->nullable();
            $table->Integer('keywords')->nullable();
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
        Schema::dropIfExists('spot_lists');
    }
}
