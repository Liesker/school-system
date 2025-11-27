<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Roster;

class Classroom extends Model
{
    //

    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }
}
