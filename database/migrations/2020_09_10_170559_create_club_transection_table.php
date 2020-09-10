<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_transection', function (Blueprint $table) {
            $table->id();
            $table->string('club_id');
            $table->string('club_owner_id');
            $table->string('from_id');
            $table->double('debit');
            $table->double('credit');
            $table->double('balance');
            $table->string('description');
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
        Schema::dropIfExists('club_transection');
    }
}
