<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'file',
        'link'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }

    public function clients()
    {
        return $this->hasMany(Contract::class, 'banner_id', 'id');
    }

    public function banners()
    {
        return $this->belongsTo(Advert::class);
    }

    public static function sendFile($request){
        $path = $request->store('banners');
        return $path;
    }

    public function get_banner($id)
    {
      $advert = Advert::where(['carrossel_id' => $id])->first();

      if ($advert) {
          $file = $advert->attachments()->get();
          return ['path'=> $file[0]->path, 'link'=>$advert->link];
      } else {
          return false;
      }

    }


}
