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
            $table->String('Audit_green')->nullable();
            $table->String('Audit_orange')->nullable();
            $table->String('Intégration_green')->nullable();
            $table->String('Intégration_orange')->nullable();
            $table->String('Développement_green')->nullable();
            $table->String('Développement_orange')->nullable();
            $table->String('Coaching_green')->nullable();
            $table->String('Coaching_orange')->nullable();
            $table->String('Optimisation de contenus_green')->nullable();
            $table->String('Optimisation de contenus_orange')->nullable();
            $table->String('Rédaction_green')->nullable();
            $table->String('Rédaction_orange')->nullable();
            $table->String('Backlinks_green')->nullable();
            $table->String('Backlinks_orange')->nullable();
            $table->String('Refonte maillage interne_green')->nullable();
            $table->String('Refonte maillage interne_orange')->nullable();
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
            $table->dropColumn('Audit_green');
            $table->dropColumn('Audit_orange');
            $table->dropColumn('Intégration_green');
            $table->dropColumn('Intégration_orange');
            $table->dropColumn('Développement_green');
            $table->dropColumn('Développement_orange');
            $table->dropColumn('Coaching_green');
            $table->dropColumn('Coaching_orange');
            $table->dropColumn('Optimisation de contenus_green');
            $table->dropColumn('Optimisation de contenus_orange');
            $table->dropColumn('Rédaction_green');
            $table->dropColumn('Rédaction_orange');
            $table->dropColumn('Backlinks_green');
            $table->dropColumn('Backlinks_orange');
            $table->dropColumn('Refonte maillage interne_green');
            $table->dropColumn('Refonte maillage interne_orange');
        });
    }
}
