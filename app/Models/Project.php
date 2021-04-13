<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $fillable = [
        'name',
        'slug',
        'description',
        'file'
    ];

    public function sendFile($request){
        $path = $request->store('projects');
        return $path;
    }
}
