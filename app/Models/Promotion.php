<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name',
        'client_id',
        'days',
        'description'
    ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function sendFiles($files){

        foreach ($files as $file){
            $path = $file->store('attachments');
            $this->attachments()->create(['path' => $path]);
        }

        return true;
    }
}
