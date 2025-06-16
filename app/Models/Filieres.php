<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filieres extends Model
{
    use HasFactory;


    /**
     * Get the etablissements associated with the Filieres
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function etablissements(): BelongsTo
    {
        return $this->belongsTo(Etablissements::class, 'id_etab', 'id');
    }


    /**
     * Get the niveaus that owns the Filieres
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function niveaus(): BelongsTo
    {
        return $this->belongsTo(Niveaus::class, 'id_niveau');
    }
}
