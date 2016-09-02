<?php

namespace App\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;
use App\User;
use App\LogStat;
use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
    
    public $user;
   
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
         
    }

    /**
     * Handle the event.
     *
     * @param  UserSuccessfullLogin  $event
     * @return void
     */
    public function handle(Login $event)
    {

        $this->user = Auth::user();

        $logUser = new LogStat();
        $logUser->name = "Login_Success";
        $logUser->type = "login";
        $logUser->description = "Connection de l'utilisateur ".$this->user->name;
        $logUser->user_name = $this->user->name;
        $logUser->user_id = $this->user->id;
        $logUser->user_ip = $_SERVER['REMOTE_ADDR'];

        $logUser->save();

        
    }
}
