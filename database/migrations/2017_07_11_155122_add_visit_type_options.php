<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisitTypeOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visit_types', function($table) {
            $table->integer('color')->unsigned()->nullable()->default(0);
            $table->integer('icon')->unsigned()->nullable()->default(7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_types', function($table) {
            $table->dropColumn('color');
            $table->dropColumn('icon');
        });
    }
}
