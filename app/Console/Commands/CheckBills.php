<?php

namespace App\Console\Commands;

use App\Models\BillEntry;
use App\Models\Contract;
use Illuminate\Console\Command;

class CheckBills extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bills:overdue';


    protected $description = 'Percorre os atrasados';


    public function __construct()
    {
        parent::__construct();
    }

      public function handle()
    {
        $bills = BillEntry::whereRaw('due < now()')->where('status', 'pendent')->get();

        foreach ($bills as $bill){
            $bill->update(['status'=>'overdue']);
        }
    }
}
