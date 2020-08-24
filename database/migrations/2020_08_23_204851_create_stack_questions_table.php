<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStackQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stack_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auto_stack_cat_id');
            $table->foreign('auto_stack_cat_id')->references('id')->on('auto_stack_categories')->onDelete('cascade');
            $table->string('question');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stack_questions');
    }
}