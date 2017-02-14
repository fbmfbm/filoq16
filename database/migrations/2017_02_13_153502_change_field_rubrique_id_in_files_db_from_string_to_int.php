<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldRubriqueIdInFilesDbFromStringToInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::statement("UPDATE file SET col_name = replace(rubrique_id, '0', '');");
        //DB::statement("ALTER TABLE files ALTER COLUMN rubrique_id TYPE integer USING (rubrique_id::integer);");
        Schema::table('files', function ($table) {
            //$table->integer('rubrique_id')->unsigned()->change();
            $table->foreign('rubrique_id')->references('id')->on('file_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function ($table) {
            $table->dropForeign('files_rubrique_id_foreign');
        });
    }
}
