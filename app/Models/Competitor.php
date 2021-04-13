<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
   protected $fillable = [
       'raffle_id', 'name', 'phone', 'address', 'response'
   ];

   public function promotion()
   {
       return $this->hasOne(Promotion::class);
   }
}
