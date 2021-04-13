<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;

    public function hasAdvertsements()
    {
        return $this->belongsTo(AdvertsementHasApplication::class, 'applications_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 'Y');
    }
}
