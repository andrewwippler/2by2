<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function($table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->foreign('household_id')->references('id')->on('households')->onDelete('cascade');
        });

        Schema::table('visits', function($table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->foreign('household_id')->references('id')->on('households')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visits', function($table) {
            $table->dropForeign(['household_id']);
        });

        Schema::table('people', function($table) {
            $table->dropForeign(['household_id']);
        });
    }
}
