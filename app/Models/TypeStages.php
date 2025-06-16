<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeStages extends Model
{
    use HasFactory;


    /**
     * Get all of the offreStages for the TypeStages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offreStages(): HasMany
    {
        return $this->hasMany(OffreStages::class, 'foreign_key', 'local_key');
    }
}
