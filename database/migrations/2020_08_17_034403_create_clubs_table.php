<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('is_active')->default(1);
            $table->double('balance')->nullable();
            $table->double('lock_balance')->nullable();

            // $table->unsignedBigInteger('member')->nullable();
            $table->bigInteger('member')->nullable();

            $table->float('commission')->nullable();
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
        Schema::dropIfExists('clubs');
    }
}
