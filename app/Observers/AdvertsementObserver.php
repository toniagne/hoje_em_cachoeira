<?php

namespace App\Observers;

use App\Models\Advertsement;

class AdvertsementObserver
{
    public function creating(Advertsement $advertsement)
    {
        $advertsement->amount = 50.5;
    }

    public function created(Advertsement $advertsement)
    {
        //
    }


    public function updated(Advertsement $advertsement)
    {
        //
    }


    public function deleted(Advertsement $advertsement)
    {
        //
    }


    public function restored(Advertsement $advertsement)
    {
        //
    }


    public function forceDeleted(Advertsement $advertsement)
    {
        //
    }
}
