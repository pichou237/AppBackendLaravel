<?php

namespace App\Models;

use App\Models\Candidatures;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etudiants extends Model
{
    use HasFactory;


    protected $primaryKey ="matricule";
    /**
     * Get all of the candidatures for the Etudiants
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function candidatures(): HasMany
    {
        return $this->hasMany(Candidatures::class, 'matricule', 'matricule');
    }
}
