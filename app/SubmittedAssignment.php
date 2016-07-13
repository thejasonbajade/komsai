<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmittedAssignment extends Model
{
    public $table = 'assignment_submissions';

    public $fillable = ['user_id', 'assignment_id', 'filename'];
}
