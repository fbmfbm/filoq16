<?php

namespace App\Listeners;

use App\LogStat;
use Illuminate\Support\Facades\Auth;
use App\Events\FileEntryAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class LogFileEntryAdded
{
    public $user;
    public $fileEntry;
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
     * @param  FileEntryAdded  $event
     * @return void
     */
    public function handle(FileEntryAdded $event)
    {
        $this->user = Auth::user();
        $this->fileEntry = $event->fileEntry;

        $logSat = new LogStat();
        $logSat->name = "FileEntry_Added";
        $logSat->type = "file_entry";
        $logSat->description = "Ajout du fichier ".$this->fileEntry->name." par l'utilisateur ".$this->user->name;
        $logSat->user_name = $this->user->name;
        $logSat->user_id = $this->user->id;
        $logSat->user_ip = $_SERVER['REMOTE_ADDR'];
        $logSat->save();
    }
}
