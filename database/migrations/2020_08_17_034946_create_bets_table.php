<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('id');

            $table->unsignedBigInteger('bet_by');
            // $table->bigInteger('bet_by')->unsigned();
            $table->string('match');

            $table->unsignedBigInteger('game_id');
            // $table->bigInteger('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->unsignedBigInteger('question_id');
            // $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');


            $table->unsignedBigInteger('answer_id');
            // $table->bigInteger('answer_id')->unsigned();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

            $table->float('amount');
            $table->float('return_rate');
            $table->float('total_win');
            $table->float('return_amount');
            $table->float('club_fee');

            $table->enum('status', ['winner', 'looser', 'cancelled', ''])->default('');

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
        Schema::dropIfExists('bets');
    }
}
