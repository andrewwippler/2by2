<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderingToLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('departments', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('life_stages', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('marital_statuses', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('prospect_statuses', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('relationships', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('spiritual_conditions', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('sunday_schools', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('teams', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::table('visit_types', function($table) {
            $table->integer('position')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('life_stages', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('marital_statuses', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('prospect_statuses', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('relationships', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('spiritual_conditions', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('sunday_schools', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('teams', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('visit_types', function($table) {
            $table->dropColumn('position');
        });
    }
}
