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
            $table->String('prix')->nullable();
            $table->String('profile_facebook')->nullable();
            $table->String('ref_domain')->nullable();
            $table->String('trust_flow')->nullable();
            $table->String('citation_flow')->nullable();
            $table->String('majestic_flow')->nullable();
            $table->String('keywords')->nullable();
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
