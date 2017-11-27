<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillEvalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_evals', function (Blueprint $table) {

    		# Increments method will make a Primary, Auto-Incrementing field.
    		# Most tables start off this way
    		$table->increments('id');

    		# This generates two columns: `created_at` and `updated_at` to
    		# keep track of changes to a row
    		$table->timestamps();

    		# The rest of the fields...
            $table->string('evaluator');
            $table->date('date');
    		$table->integer('dining_room')->unsigned();
            $table->integer('front_counter')->unsigned();
            $table->integer('drive_thru')->unsigned();
            $table->integer('headset')->unsigned();
            $table->integer('face_to_face')->unsigned();
            $table->integer('bagging')->unsigned();
            $table->integer('boards')->unsigned();
            $table->integer('specials')->unsigned();
            $table->integer('breading')->unsigned();
            $table->integer('lean')->unsigned();
            $table->integer('biscuits')->unsigned();
            $table->integer('breakfast_boards')->unsigned();
            $table->integer('breakfast_specials')->unsigned();
            $table->integer('opening_front')->unsigned();
            $table->integer('opening_boards')->unsigned();
            $table->integer('opening_lean')->unsigned();
            $table->integer('closing_front')->unsigned();
            $table->integer('closing_boards')->unsigned();
            $table->integer('closing_lean')->unsigned();
            $table->text('comment')->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skill_evals');
    }
}
