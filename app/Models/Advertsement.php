<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertsement extends Model
{
    protected  $fillable = [
        'id',
        'name',
        'details',
        'amount',
        'file_description'
    ];

    public function getApplications()
    {
        return $this->belongsTo(AdvertsementHasApplication::class, 'id', 'advertsements_id');
    }

    public function applications()
    {
        return $this->belongsToMany(AdvertsementHasApplication::class, 'advertsements_has_applications', 'advertsements_id', 'applications_id')->withTimestamps();
    }

    public function monetary(){
        return number_format($this->amount, 2,',', '.');
    }

    public static function convertMonetary($args){

        $numberConvertedExp = str_replace(".", "", $args);
        return number_format( floatval($numberConvertedExp), 2, '.', '');
    }

    public function setApplications($args){
        $this->applications()->sync($args);
    }

    public function isAttached($itemId){
        $checkApplication = AdvertsementHasApplication::where('advertsements_id',$this->id)->where('applications_id', $itemId)->first();

        if ($checkApplication){
            return true;
        }
    }


}
