<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseholdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('households', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('last_name');
            $table->integer('people', false);
            $table->string('home_phone');
            $table->integer('department', false);
            $table->boolean('connected');
            $table->datetime('plan_to_visit');
            $table->string('interested_in');
            $table->text('family_notes');
            $table->datetime('first_contacted');
            $table->string('point_of_contact');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->integer('zip', false);
            $table->integer('user', false);
            $table->integer('visits', false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('households');
    }
}
