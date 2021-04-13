<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable = [
        'name', 'client_id', 'carrossel_id', 'file', 'slug', 'link'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function carrossel()
    {
        return $this->hasOne(Banner::class, 'id', 'carrossel_id');
    }

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }



    public function sendFile($files){


        $this->attachments()->forceDelete();

        foreach ($files as $file){
            $path = $file->store('attachments');
            $this->attachments()->create(['path' => $path]);
        }

        return true;
    }
}
