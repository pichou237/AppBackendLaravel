<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etablissements extends Model
{
    use HasFactory;

    /**
     * Get all of the filieres for the Etablissements
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filieres(): HasMany
    {
        return $this->hasMany(Filieres::class, 'id_etab', 'id');
    }
}
