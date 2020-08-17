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
            // $table->unsignedBigInteger('bet_by');
            // $table->unsignedBigInteger('game_id');
            // $table->unsignedBigInteger('question_id');
            // $table->unsignedBigInteger('answer_id');
            // $table->float('amount');
            // $table->float('return_rate');
            // $table->float('total_win');
            // $table->float('return_amount');
            // $table->float('club_fee');
            // $table->string('status');
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
