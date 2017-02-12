<?php

namespace App\Listeners;

use App\Events\QueryAjaxOnTerritory;
use App\LogStat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LogQueryAjaxForTerritory
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
     * @param  QueryAjaxOnTerritory  $event
     * @return void
     */
    public function handle(QueryAjaxOnTerritory $event)
    {
        $this->user = Auth::user();

        $logSat = new LogStat();
        $logSat->name = "Query_executed";
        $logSat->type = "Query_ajax";
        $logSat->description = "Requête Ajax sur le territoire ".$event->refScale."(".$event->refCode.") par l'utilisateur ".$this->user->name;
        $logSat->user_name = $this->user->name;
        $logSat->user_id = $this->user->id;
        $logSat->user_ip = $_SERVER['REMOTE_ADDR'];
        $logSat->save();

    }
}
