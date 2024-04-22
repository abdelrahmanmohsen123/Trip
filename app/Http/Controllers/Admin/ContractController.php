<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contracts\ContractStoreRequest;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contracts = Contract::paginate(10); // Paginate with 10 contracts per page

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clients = Client::all();
        return view('contracts.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractStoreRequest $request)
    {
        //

        $data = $request->except(['trip_dates','_token']);

       // Find the last contract number in the database
        $lastContractNumber = Contract::max('contract_number');

        // Increment the last contract number by 1
        $newContractNumber = $lastContractNumber + 1;

        // Assign the new contract number to the data array
        $data['contract_number'] =  $newContractNumber;
        $new_contract = Contract::create($data);
        // $new_conreact->trips()->attach()
        foreach($request->trip_dates as $trip_date){
            $new_contract->trips()->create(
                [
                    'trip_date'=>$trip_date,
                    'contract_id' => $new_contract->id
                ]);

        }


        return redirect()->route('contracts.index')->with('success','Contract Created Success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
