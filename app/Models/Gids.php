<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gids extends Model
{
    use HasFactory;

    protected $table = 'gids';

    protected $fillable = [
        'naam',
        'beschrijving',
        'jaar',
    ];

    // Relatie: Gids bevat meerdere Vakken (M:N)
    public function vakken()
    {
        return $this->belongsToMany(Vak::class, 'gids_vak', 'gids_id', 'vak_id');
    }
}
