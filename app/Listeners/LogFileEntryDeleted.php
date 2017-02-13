<?php

namespace App\Listeners;

use App\LogStat;
use Illuminate\Support\Facades\Auth;
use App\Events\FileEntryDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogFileEntryDeleted
{
    public $fileEntry;
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
     * @param  FileEntryDeleted  $event
     * @return void
     */
    public function handle(FileEntryDeleted $event)
    {

        $this->user = Auth::user();

        $this->fileEntry = $event->fileEntry;
        $logSat = new LogStat();
        $logSat->name = "FileEntry_Deleted";
        $logSat->type = "file_entry";
        $logSat->description = "Suppression du fichier ".$this->fileEntry->name." par l'utilisateur ".$this->user->name;
        $logSat->user_name = $this->user->name;
        $logSat->user_id = $this->user->id;
        $logSat->user_ip = $_SERVER['REMOTE_ADDR'];
        $logSat->save();
    }
}
