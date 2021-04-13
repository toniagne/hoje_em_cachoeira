<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
   protected $fillable = [
     'news_categtory_id',
       'slug',
     'title',
     'description',
     'body',
     'image',
       'link'
   ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

   public function category()
   {
       return $this->hasOne(NewsCategory::class, 'id', 'news_category_id');
   }

    public function sendFiles($files){

        if (isset($files)){
            foreach ($files as $file){
                $path = $file->store('clients');
                $this->attachments()->create(['path' => $path]);
            }
        }

        return true;
    }

    public static function sendFile($request){
        $path = $request->store('news');
        return $path;
    }

    public function get_category($category_id)
    {
        $category = NewsCategory::find($category_id);

        return $category->title;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($this->attributes['title'], '-');
    }
}
