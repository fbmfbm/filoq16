<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use Carbon\Carbon;

class HomeControllerTest extends TestCase
{


    public function XtestThatUserFbmIsInDatabase()
    {

        $this->seeInDatabase('users', ['email' => 'fabien@fmaison.com']);
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

    public function testToBeRedirectToLoginIfNavigateToAdmin()
    {
        $this->visit('/admin')
            ->seePageIs('/login');
    }

    public function testFbmUserCanGoToAdminDashBoard()
    {
        $user = new User(array(
            'id' => 1000,
            'name' => 'fbmfbm',
            'email' => 'fabien@fmaison.com',
            'password' => '12345678',
            'role_id' => 1,
            'is_active' => 1,
            'created_at' => Carbon::now()
            ));
        $this->be($user); //You are now authenticated
        $this->visit('/admin')
            ->seePageIs('/admin');
    }

    public function XtestLogin()
    {
        $this->visit('/')
            ->click('Connectez-vous')
            ->see('Connexion')
            ->see('E-mail')
            ->type('fabien@fmaison.com', 'email')
            ->type('fbmfbm68', 'password')
            ->press('Connexion')
            ->seePageIs(route('home'));
    }

}
