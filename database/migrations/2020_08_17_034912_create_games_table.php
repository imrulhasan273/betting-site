<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id');

            // $table->unsignedBigInteger('type_id');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            //date
            $table->date('date');
            //time
            $table->time('time');

            $table->string('name');
            $table->string('tournament_name');
            $table->string('game_update');

            $table->enum('status', ['live', 'upcoming', 'hidden', 'finished']);

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
        Schema::dropIfExists('games');
    }
}
