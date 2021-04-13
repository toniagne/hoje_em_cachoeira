<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertsementHasApplications extends Model
{
    protected $fillable = [
        'advertsements_id',
        'applications_id',
    ];

    public function advertsement()
    {
        return $this->belongsTo(Advertsement::class, 'advertsements_id', 'id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'applications_id', 'id');
    }
}
