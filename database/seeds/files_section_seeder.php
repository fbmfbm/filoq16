<?php

use Illuminate\Database\Seeder;

class files_section_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_sections')->delete();

        DB::table('file_sections')->insert(['name' => 'methodo','description'=>'Méthodologie', 'active'=> true ]);
        DB::table('file_sections')->insert(['name' => 'etudes','description'=>'Études et rapports', 'active'=> true ]);
        DB::table('file_sections')->insert(['name' => 'textes','description'=>'Textes réglementaires', 'active'=> true ]);
    }
}
