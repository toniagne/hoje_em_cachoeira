<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Catalog extends Model
{
    protected $fillable = [
        'name',
        'client_id',
        'description',
        'value'
    ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function sendFiles($files){

        $this->attachments()->forceDelete();

        foreach ($files as $file){
            $path = $file->store('attachments');
            $this->attachments()->create(['path' => $path]);
        }

        return true;
    }

    public function setClientIdAttribute()
    {
        if (Auth::guard('gestao')->check()){
            $this->attributes['client_id'] = Auth::guard('gestao')->user()->id;
        } else {
            $this->attributes['client_id'] = Auth::guard('web')->user()->id;
        }

    }

    public function scopeGetClient($query)
    {
        return $query->where('client_id', Auth::guard('gestao')->user()->id);
    }

    public function getPreloadFiles()
    {
        $preload = [];
        foreach ($this->attachments()->get() as $files)
        {

            $preload[] = [
                'name' => array_reverse(explode('/', $files->path))[0],
                'type' => "image/jpeg",
                'size' => Storage::size($files->path),
                'file' =>  '../../../storage/public/'.$files->path,
                'local' => '../../../storage/public/'.$files->path,
                'readerForce' => true
            ];
        }

        return json_encode($preload);

    }

    public function setValueAttribute($value)
    {
        $numberConvertedExp = str_replace(".", "", $value);
        $this->attributes['value'] = number_format( floatval($numberConvertedExp), 2, '.', '');
    }



}
