<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $backend_perm = DB::table('permissions')->insert(['name' => 'backend_display','display_name'=>'Afficher le backend', 'description'=>'Affichage de la section administration du site' ]);
        $users_gestion_perm = DB::table('permissions')->insert(['name' => 'users_add','display_name'=>'Ajouter utilisateur', 'description'=>'Ajouter un nouvel utilsateur' ]);
    	
    	factory(App\Permission::class, 15)->create();

        $adminRole = DB::table('roles')->where('name','=','admin')->first();

        DB::table('users')->where('email','=','fabien@fmaison.com')->update(['role_id'=> $adminRole->id]); 

        $adminRole = App\Role::where('name','=','admin')->first();

        $adminRole->givePermissionTo('backend_display');
        $adminRole->givePermissionTo('users_add');
        
    }
}
