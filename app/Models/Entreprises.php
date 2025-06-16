<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entreprises extends Model
{
    use HasFactory;

    /**
     * Get all of the OffreStages for the Entreprises
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offreStages(): HasMany
    {
        return $this->hasMany(OffreStages::class, 'id_ent', 'id');
    }
}
