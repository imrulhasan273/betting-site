<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidthdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widthdraws', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            // $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('user_role');
            $table->string('method');
            $table->string('method_type');
            $table->float('amount');
            $table->string('widthdraw_to');
            $table->text('note')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('widthdraws');
    }
}
