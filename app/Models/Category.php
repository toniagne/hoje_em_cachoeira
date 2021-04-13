<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'slug'
    ];

    public function getBanners(){
        return $this->hasMany(Banner::class);
    }

    public function sendFile($request){
        $path = $request->store('categories');
        return $path;
    }

}
