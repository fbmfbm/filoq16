<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogStat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'content', 'ip'
    ];
}
