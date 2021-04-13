<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'client_id',
        'ecommerce_category_id',
        'name',
        'description',
        'value',
        'discount',
        'size',
        'options',
        'image'
    ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function category()
    {
        return $this->hasOne(EcommerceCategory::class, 'id', 'ecommerce_category_id');
    }

    public function stock()
    {
        return $this->hasOne(ProductStock::class, 'product_id', 'id');
    }

    public function scopeGetClient($query)
    {
        return $query->where('client_id', Auth::guard('gestao')->user()->id);
    }

    public function setValueAttribute($value)
    {
        $numberConvertedExp = str_replace(".", "", $value);
        $this->attributes['value'] = number_format( floatval($numberConvertedExp), 2, '.', '');
      }

    public function setClientIdAttribute()
    {
        $this->attributes['client_id'] = Auth::guard('gestao')->user()->id;
    }


    public function setStock($number)
    {
        $this->stock()->forceDelete();

        return ProductStock::create([
            'product_id' => $this->id,
            'previous_number' => 0,
            'next_number' => $number
        ]);
    }

    public function sendFiles($files){

        $this->attachments()->forceDelete();

        foreach ($files as $file){

                $path = $file->store('attachments');
                $this->attachments()->create(['path' => $path]);
        }

        return true;
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
}
