<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('website')->nullable();
            $table->String('email')->nullable();
            $table->Integer('month')->nullable();
            $table->String('price')->nullable();
            $table->unsignedBigInteger('project_type_id');
            $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->String('project_type_checkbox')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
