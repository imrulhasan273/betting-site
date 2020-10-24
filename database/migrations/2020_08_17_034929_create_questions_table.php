<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('id');

            $table->unsignedBigInteger('game_id');
            // $table->bigInteger('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->string('question');
            $table->boolean('is_active')->default(true);
            $table->boolean('flag')->default(false);
            $table->boolean('flag_ans')->default(false);
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
        Schema::dropIfExists('questions');
    }
}
