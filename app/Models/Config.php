<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'title',
        'policies',
        'terms',
        'slides',
        'logo',
        'release',
        'metatags',
        'about'
    ];

    public function sendFile($request){
        $path = $request->store('configs');
        return $path;
    }
}
