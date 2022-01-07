<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->Integer('Audit')->default(1);
            $table->Integer('Intégration')->default(1);
            $table->Integer('Développement')->default(1);
            $table->Integer('Coaching')->default(1);
            $table->Integer('Optimisation de contenus')->default(1);
            $table->Integer('Rédaction')->default(1);
            $table->Integer('Backlinks')->default(1);
            $table->Integer('Refonte maillage interne')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('Audit');
            $table->dropColumn('Intégration');
            $table->dropColumn('Développement');
            $table->dropColumn('Coaching');
            $table->dropColumn('Optimisation de contenus');
            $table->dropColumn('Rédaction');
            $table->dropColumn('Backlinks');
            $table->dropColumn('Refonte maillage interne');
        });
    }
}
