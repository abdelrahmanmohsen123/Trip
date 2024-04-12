<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trip;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Trips\TripStoreRequest;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trips = Trip::paginate(10); // Paginate with 10 trips per page
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contracts = Contract::all();
        return view('trips.create',compact('contracts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripStoreRequest $request)
    {
        //
        $data = $request->validated();
        $new_trip = Trip::create($data);
        return redirect()->route('trips.index')->with('success','trip Created Success');
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
        $trip = Trip::findOrFail($id);
        $trip->delete();
        return redirect()->back()->with('success','Trip Deleted Success');
    }
}
