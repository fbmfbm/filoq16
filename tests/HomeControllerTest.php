<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    

	 public function createApplication()
    {
        putenv('DB_DEFAULT=sqlite_testing');

        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
        //Artisan::call('migrate:reset');
        //parent::tearDown();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/')
             ->see('Connectez-vous');
    }


    public function testLogin()
    {
        
        $this->visit('/login')
        ->submitForm('Connexion', array('email'=>'fabien@fmaison.com', 'password'=>'fbmfbm68'))
        ->seePageIs('/')
        ->see('Bienvenue');

    }



    
}
