<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Contract;

class ContractObserver
{
    /**
     * Handle the Contract "created" event.
     */
    public function created(Contract $contract): void
    {
        //
        $currentTime = Carbon::now();
        $contractNumber = 'CONTACT_' . $currentTime->format('YmdHis');

        // Assign the generated contract number to the contract
        $contract->contract_number = $contractNumber;
         $contract->save();
    }

    /**
     * Handle the Contract "updated" event.
     */
    public function updated(Contract $contract): void
    {
        //
    }

    /**
     * Handle the Contract "deleted" event.
     */
    public function deleted(Contract $contract): void
    {
        //
    }

    /**
     * Handle the Contract "restored" event.
     */
    public function restored(Contract $contract): void
    {
        //
    }

    /**
     * Handle the Contract "force deleted" event.
     */
    public function forceDeleted(Contract $contract): void
    {
        //
    }
}
