<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EcommerceCategory extends Model
{
   protected $fillable = [
       'client_id',
       'name',
       'slug',
       'icon'
   ];

    public function setClientIdAttribute($password)
    {
        $this->attributes['client_id'] = Auth::guard('gestao')->user()->id;
    }

    public function scopeGetClient($query)
    {
        return $query->where('client_id', Auth::guard('gestao')->user()->id);
    }

}
