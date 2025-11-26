<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cijfer extends Model
{
    protected $fillable = ['user_id', 'vak', 'waarde'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
