<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();
        
        $fbm = factory(App\User::class)->create([ 'email' => 'fabien@fmaison.com', 'name' => 'fbmfbm', 'password' => bcrypt('fbmfbm68'), ]);

        $lambda = factory(App\User::class)->create([
            'email'=>'lambda@lambda.com',
            'name'=>'lambda',
            'password'=>bcrypt('lambda'),
            ]);

        factory(App\User::class, 10)->create();

    }
}
