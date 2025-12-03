<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Afdeling extends Model
{
    protected $table = 'afdelingen';
    
    protected $fillable = [
        'naam',
        'beschrijving',
        'opleiding_id',
    ];

    public function opleiding(): BelongsTo
    {
        return $this->belongsTo(Opleiding::class);
    }
}