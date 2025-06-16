<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidatures extends Model
{
    use HasFactory;

    /** 
     * Get the Etudiants that owns the Candidatures
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Etudiants(): BelongsTo
    {
        return $this->belongsTo(Etudiants::class, 'matricule');
    }

    
    /** 
    * Get the OffreStages that owns the Candidatures
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    function offreStages():BelongsTo{
        return $this->belongsTo(OffreStages::class ,'id_offre');
    }
}
