<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Klas extends Model
{
    protected $table = 'klassen';
     
    protected $fillable = [
        'naam',
        'opleiding_id',
        'jaar',
    ];

    public function opleiding(): BelongsTo
    {
        return $this->belongsTo(Opleiding::class);
    }
}