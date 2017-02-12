<?php

namespace App\Listeners;

use App\Events\UserDeleted;
use App\LogStat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LogUserDeleted
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
     * @param  UserDeleted  $event
     * @return void
     */
    public function handle(UserDeleted $event)
    {
        $this->user = Auth::user();
        $deletedUser = $event->userDeleted;

        $logUser = new LogStat();
        $logUser->name = "User_Deleted";
        $logUser->type = "User";
        $logUser->description = "Suppression de l'utilisateur ".$deletedUser->name."(".$deletedUser->id.") par ".$this->user->name;
        $logUser->user_name = $this->user->name;
        $logUser->user_id = $this->user->id;
        $logUser->user_ip = $_SERVER['REMOTE_ADDR'];

        $logUser->save();

    }
}
