<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileSection extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'file_sections';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'active'
    ];

    public function fileEntrys(){
        return $this->hasMany(FileEntry::class);
    }
//
}
