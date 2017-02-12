<?php

namespace App\Listeners;

use App\Events\FileEntryLoaded;
use App\LogStat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LogFileEntryDownloadByUser
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
     * @param  FileEntryLoaded  $event
     * @return void
     */
    public function handle(FileEntryLoaded $event)
    {
        $this->user = Auth::user();

        $logSat = new LogStat();
        $logSat->name = "FileEntry_Downloaded";
        $logSat->type = "file_entry";
        $logSat->description = "Téléchargement du fichier ".$event->fileEntryName." par l'utilisateur ".$this->user->name;
        $logSat->user_name = $this->user->name;
        $logSat->user_id = $this->user->id;
        $logSat->user_ip = $_SERVER['REMOTE_ADDR'];
        $logSat->save();

    }
}
