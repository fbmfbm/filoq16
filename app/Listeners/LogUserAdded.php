<?php

namespace App\Listeners;

use App\Events\UserAdded;
use App\LogStat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LogUserAdded
{
    public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserAdded  $event
     * @return void
     */
    public function handle(UserAdded $event)
    {
        $this->user = Auth::user();


        $logUser = new LogStat();
        $logUser->name = "User_Added";
        $logUser->type = "User";
        $logUser->description = "Ajout de l'utilisateur ".$event->userAddedName." par ".$this->user->name;
        $logUser->user_name = $this->user->name;
        $logUser->user_id = $this->user->id;
        $logUser->user_ip = $_SERVER['REMOTE_ADDR'];

        $logUser->save();

    }
}
