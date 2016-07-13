<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'class_files';

    public $fillable = ['class_id', 'filename', 'date_uploaded', 'id', 'user_type'];
}
