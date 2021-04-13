<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Client extends Authenticatable
{
    use Notifiable;

    protected $guard = 'gestao';

    protected $fillable = [
        'city_id',
        'name',
        'company',
        'document',
        'email',
        'phone',
        'phone_comercial',
        'address',
        'cep',
        'facebook',
        'instagram',
        'site',
        'release',
        'file',
        'active',
        'slug',
        'services',
        'password',
        'ecommerce_image'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function contracts()
    {
        return $this->belongsTo(Contract::class, 'id', 'client_id');
    }

    public function catalog(){
        return $this->belongsTo(Catalog::class, 'id', 'client_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'client_id', 'id');
    }

    public function ecommerce_categories(){
        return $this->hasMany(EcommerceCategory::class, 'client_id', 'id');
    }

    public static function sendFile($request){
        $path = $request->store('clients');
        return $path;
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

    public function situation(){
        return $this->active = 1 ? 'Ativo': 'Inativo';
    }

    public static function promotions($client_id)
    {
        $raffle =  Raffle::where('client_id', $client_id)->first();

       return $raffle;

    }

    public static function promotions_participate($competitors_data)
    {
        Competitor::create($competitors_data);

        return true;
    }
}
