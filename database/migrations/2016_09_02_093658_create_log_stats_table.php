<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('type',25);
            $table->text('description');
            $table->integer('user_id');
            $table->string('user_ip', 25);
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
        Schema::drop('log_stats');
    }
}
