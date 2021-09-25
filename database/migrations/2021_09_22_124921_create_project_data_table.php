<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_data', function (Blueprint $table) {
            $table->id();
            $table->String('url')->nullable();
            $table->String('ancre')->nullable();
            $table->String('url_spot')->nullable();
            $table->String('prestataire')->nullable();
            $table->String('price')->nullable();
            $table->String('month')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->boolean('saved')->default(0);
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
        Schema::dropIfExists('project_data');
    }
}
