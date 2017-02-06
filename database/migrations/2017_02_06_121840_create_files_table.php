<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('short_title',100)->nullable();
            $table->string('description')->nullable();
            $table->string('rubrique_id');
            $table->string('path')->nullable();
            $table->string('mime');
            $table->string('type');
            $table->integer('size');
            $table->boolean('active')->default(true);
            $table->integer('level')->default(1);
            $table->integer('owner');

            $table->index('type', 'file_type_index');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');

    }
}
