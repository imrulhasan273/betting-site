<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStackAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stack_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('stack_questions')->onDelete('cascade');
            $table->string('answer');
            $table->float('bet_rate');

            $table->unsignedBigInteger('place')->default(0);
            $table->unsignedBigInteger('bet_amount')->default(0);
            $table->unsignedBigInteger('rtrn_amount')->default(0);
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
        Schema::dropIfExists('stack_answers');
    }
}
