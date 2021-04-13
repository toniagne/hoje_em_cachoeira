<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raffle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'client_id',
        'description',
        'end',
        'status'
    ];

    protected $dates = [
        'end'
    ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function competitor()
    {
        return $this->hasMany(Competitor::class);
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
