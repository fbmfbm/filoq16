<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{


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

    public function testThatUserFbmIsInDatabase()
    {

        $this->seeInDatabase('users', ['email' => 'fabien@fmaison.com']);
    }

    public function testToBeRedirectToLoginIfNavigateToAdmin()
    {
        $this->visit('/admin')
            ->seePageIs('/login');
    }

    public function testLogin()
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
