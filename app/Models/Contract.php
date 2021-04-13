<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{

    protected $fillable = [
        'contract_number',
        'client_id',
        'advertsement_id',
        'category_id',
        'banner_id',
        'date_start',
        'date_end',
        'payment_id',
        'amount',
        'discount',
        'total',
        'file',
        'tags',
        'status',
        'spot'
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function advertsement()
    {
        return $this->belongsTo(Advertsement::class, 'advertsement_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function carrosel()
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }


    public function amount(){
        return number_format($this->amount, 2,',', '.');
    }

    public function total(){
        return number_format($this->total, 2,',', '.');
    }

    public function sendFile($request){
        $path = $request->store('contract');
        return $path;
    }

    public function parseDateBD($date){
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public static function convertMonetary($args){
        $numberConvertedExp = str_replace(".", "", $args);
        return number_format( floatval($numberConvertedExp), 2, '.', '');
    }

    public function isValid(){
        return self::where('date_end', '>=', Carbon::now()->toDateString())->where('status','NOVO')->where('spot', 1)->get();
    }

    public function getBanners(){
        return Banner::where('category_id', $this->category->id)->get();
    }

}
