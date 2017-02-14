<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

        DB::table('permissions')->insert(['name' => 'display_backend','display_name'=>'Afficher le backend', 'description'=>'Affichage de la section administration du site', 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'display_user','display_name'=>'Afficher les utilisateurs', 'description'=>'Afficher les utilsateurs du site', 'created_at'=> Carbon::now()  ]);
        DB::table('permissions')->insert(['name' => 'add_user','display_name'=>'Ajouter un utilisateur', 'description'=>'Ajouter un nouvel utilsateur' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'del_user','display_name'=>'Supprimer un utilisateur', 'description'=>'Supprimer un utilsateur' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'display_role','display_name'=>'Afficher les Roles', 'description'=>'Affichage des Roles du site' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'add_role','display_name'=>'Ajouter un Roles', 'description'=>'Ajouter un Roles au site' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'del_role','display_name'=>'Supprimer un Roles', 'description'=>'Suprimer un Roles du site' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'display_perm','display_name'=>'Afficher les Permissions', 'description'=>'Affichage des Permissions du site', 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'add_perm','display_name'=>'Ajouter une Permission', 'description'=>'Ajouter une Permission au site' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'del_perm','display_name'=>'Supprimer une Permission', 'description'=>'Suprimer une Permission du site' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'add_admin','display_name'=>'Ajouter un admin', 'description'=>'Ajouter un Admin' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'del_admin','display_name'=>'Supprimer un admin', 'description'=>'Supprimer un Admin' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'edit_admin','display_name'=>'Actualiser un admin', 'description'=>'Actualiser un Admin' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'add_file','display_name'=>'Ajouter un fichier', 'description'=>'Ajouter un fichier' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'del_file','display_name'=>'Supprimer un fichier', 'description'=>'Supprimer un fichier' , 'created_at'=> Carbon::now() ]);
        DB::table('permissions')->insert(['name' => 'display_file','display_name'=>'Afficher un fichier', 'description'=>'Afficher un fichier' , 'created_at'=> Carbon::now() ]);

    	//factory(App\Permission::class, 15)->create();





    }
}
