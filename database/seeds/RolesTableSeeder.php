<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

        DB::table('roles')->insert(['name'=>'user','display_name' => 'Utilisateur','description'=> 'Utilisateur enregistré',  'created_at'=> Carbon::now() ]);
        DB::table('roles')->insert(['name'=>'admin','display_name' => 'Administrateur','description'=> 'Administrateur général du site', 'created_at'=> Carbon::now() ]);
        DB::table('roles')->insert(['name'=>'gestion','display_name' => 'Gestionnaire','description'=> 'Gestionnaire administratif du site', 'created_at'=> Carbon::now() ]);
        
        //$adminfactory(App\Role::class,4)->make();

        //$admin = DB::table('roles')->where('name','=','admin')->first();
        //$gest = DB::table('roles')->where('name','=','gestion')->first();

        $admin = App\Role::where('name','=','admin')->first();
        $gest = App\Role::where('name','=','gestion')->first();

        $admin->givePermissionTo('display_backend');
        $admin->givePermissionTo('display_user');
        $admin->givePermissionTo('add_user');
        $admin->givePermissionTo('del_user');
        $admin->givePermissionTo('display_role');
        $admin->givePermissionTo('add_role');
        $admin->givePermissionTo('del_role');
        $admin->givePermissionTo('display_perm');
        $admin->givePermissionTo('add_perm');
        $admin->givePermissionTo('del_perm');

        $gest->givePermissionTo('display_backend');
        $gest->givePermissionTo('display_user');
        $gest->givePermissionTo('add_user');

        $gest->givePermissionTo('display_role');
        $gest->givePermissionTo('add_role');

        $gest->givePermissionTo('display_perm');
        $gest->givePermissionTo('add_perm');

    }
}
