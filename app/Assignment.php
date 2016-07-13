<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public $table = 'assignments';

    public $fillable = ['class_id', 'assignment_title', 'assignment_description', 'due_date', 'filename'];
}
