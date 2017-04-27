<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetDefaultValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function($table) {
            $table->integer('LifeStage', false)->default(0)->change();
            $table->integer('spiritual_condition', false)->default(0)->change();
            $table->integer('prospect_status', false)->default(0)->change();
            $table->integer('marital_status', false)->default(0)->change();
            $table->integer('relationship', false)->default(0)->change();
        });
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
