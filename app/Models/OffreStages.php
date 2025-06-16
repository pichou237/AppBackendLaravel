<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OffreStages extends Model
{
    use HasFactory;


    /**
     * Get the typeStage that owns the OffreStages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeStage(): BelongsTo
    {
        return $this->belongsTo(TypeStages::class, 'id_typeStage');
    }


    /**
     * Get the entreprises that owns the OffreStages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entreprises(): BelongsTo
    {
        return $this->belongsTo(Entreprises::class, 'id_ent');
    }


    /**
     * Get the secteurs that owns the OffreStages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function secteurs(): BelongsTo
    {
        return $this->belongsTo(Secteurs::class, 'id_sec');
    }
}

