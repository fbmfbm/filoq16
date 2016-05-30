<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert(['name'=>'admin','display_name' => 'Administrateur','description'=> 'Administrateur général du site',]);
        DB::table('roles')->insert(['name'=>'gestion','display_name' => 'Gestionnaire','description'=> 'Gestionnaire administratif du site',]);
        
        factory(App\Role::class,4)->make();
    }
}
