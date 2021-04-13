<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillEntry extends Model
{
    use SoftDeletes;

   protected $fillable = [
       'contract_id',
       'due',
       'amount',
       'description',
       'status'
   ];

   protected $dates = [
       'due'
   ];

   public function contract()
   {
       return $this->belongsTo(Contract::class);
   }

    public function bill()
    {
        return $this->hasOne(Bill::class, 'bill_entry_id', 'id');
    }

   public function setEntry(object $contracts)
   {
       foreach ($contracts as $contract){

           $recurrence =  $contract->date_start->diffInMonths($contract->date_end);

           for ($i = 1; $i <= $recurrence; $i++) {

                self::create([
                    'contract_id' => $contract->id,
                    'due' => $contract->date_start->addMonths($i),
                    'amount' => $contract->total,
                    'description' => $contract->advertsement->name,
                    'status' => 'pendent',
                ]);

            }

       }
   }

   function getStatus()
   {
       switch($this->status){
           case 'payed': $response = 'PAGO'; break;
           case 'pendent': $response = 'PENDENTE'; break;
           case 'partial': $response = 'PARCIAL'; break;
           case 'overdue': $response = 'ATRASADA'; break;
       }

       return $response;
   }
}
