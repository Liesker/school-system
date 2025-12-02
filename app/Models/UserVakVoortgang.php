<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVakVoortgang extends Model
{
    protected $table = 'user_vak_voortgang';

    protected $fillable = [
        'user_id',
        'vak',
        'totaal_toetsen',
    ];
}
