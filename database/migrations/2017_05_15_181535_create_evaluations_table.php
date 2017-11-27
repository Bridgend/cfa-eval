<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {

    		# Increments method will make a Primary, Auto-Incrementing field.
    		# Most tables start off this way
    		$table->increments('id');

    		# This generates two columns: `created_at` and `updated_at` to
    		# keep track of changes to a row
    		$table->timestamps();

    		# The rest of the fields...
            $table->string('evaluator');
            $table->date('date');
    		$table->integer('quantity_of_work')->unsigned();
    		$table->text('quantity_of_work_comment')->nullable();
            $table->integer('quality_of_work')->unsigned();
    		$table->text('quality_of_work_comment')->nullable();
            $table->integer('timeliness')->unsigned();
            $table->text('timeliness_comment')->nullable();
            $table->integer('cost')->unsigned();
            $table->text('cost_comment')->nullable();
            $table->integer('safety')->unsigned();
            $table->text('safety_comment')->nullable();
            $table->integer('initiative')->unsigned();
            $table->text('initiative_comment')->nullable();
            $table->integer('customer_focus')->unsigned();
            $table->text('customer_focus_comment')->nullable();
            $table->integer('adaptability')->unsigned();
            $table->text('adaptability_comment')->nullable();
            $table->integer('expression')->unsigned();
            $table->text('expression_comment')->nullable();
            $table->integer('relationships_with_others')->unsigned();
            $table->text('relationships_with_others_comment')->nullable();
            $table->integer('punctuality')->unsigned();
            $table->text('punctuality_comment')->nullable();
            $table->integer('appearance')->unsigned();
            $table->text('appearance_comment')->nullable();
            $table->integer('conduct')->unsigned();
            $table->text('conduct_comment')->nullable();
            $table->integer('knowledge_of_products')->unsigned();
            $table->text('knowledge_of_products_comment')->nullable();
            $table->integer('knowledge_of_cfa_operations')->unsigned();
            $table->text('knowledge_of_cfa_operations_comment')->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
