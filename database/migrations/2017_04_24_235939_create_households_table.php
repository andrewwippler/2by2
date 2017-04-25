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
            $table->integer('people', false)->nullable();
            $table->string('home_phone')->nullable();
            $table->integer('department', false);
            $table->boolean('connected')->nullable();
            $table->datetime('plan_to_visit')->nullable();
            $table->string('interested_in')->nullable();
            $table->text('family_notes')->nullable();
            $table->datetime('first_contacted')->nullable();
            $table->string('point_of_contact')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip', false)->nullable();
            $table->integer('user', false);
            $table->integer('visits', false)->nullable();
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
