<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('LifeStage', false);
            $table->string('email')->nullable();
            $table->integer('spiritual_condition', false);
            $table->integer('prospect_status', false);
            $table->text('notes')->nullable();
            $table->integer('marital_status', false);
            $table->integer('relationship', false);
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
        Schema::drop('people');
    }
}
