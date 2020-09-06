<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('id');

            $table->unsignedBigInteger('question_id');
            // $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            $table->string('answer');
            $table->float('bet_rate');

            $table->unsignedBigInteger('place')->default(0);
            // $table->bigInteger('place')->default(0);

            $table->double('bet_amount')->default(0);
            $table->double('rtrn_amount')->default(0);
            $table->enum('status', ['active', 'inactive', 'win', 'loss'])->default('active');
            $table->enum('result', ['winned', 'lossed', ''])->default('');
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
        Schema::dropIfExists('answers');
    }
}
