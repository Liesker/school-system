<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presences';

    protected $fillable = [
        'date',
        'time',
        'option',
        'description',
        'objection',
        'timecreated_at',
        'datecreated_at',
    ];
}
