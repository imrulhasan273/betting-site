<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            // $table->id();
            $table->bigIncrements('id');

            $table->string('name');
            $table->double('credits')->nullable();
            $table->double('lock_credits')->nullable();
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();

            $table->bigInteger('club_id')->unsigned()->nullable();
            // $table->unsignedBigInteger('club_id')->nullable();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
