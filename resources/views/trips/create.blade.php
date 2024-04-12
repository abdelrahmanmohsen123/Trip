@extends('layouts.app')

@section('title', 'Create Trips')

@section('content')
    <!-- Your contract creation form HTML goes here -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Client</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('trips.store') }}">
                            @csrf

                            <div class="row  my-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date">Trip Date:</label>
                                        <input type="date" name="trip_date" id="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contract_id">Contract :</label>
                                        <select  id="contract_id"  name="contract_id" class="form-control">
                                            <option  disabled selected>Choose Contract ....</option>
                                            @forelse ($contracts as $contarct)
                                                <option value="{{$contarct->id}}">{{ $contarct->contract_number }}</option>
                                            @empty
                                                <option value="">No contract Found</option>
                                            @endforelse
                                        </select>
                                        {{-- <input type="text" name="client_id" id="client_id" class="form-control" required> --}}
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary my-2">Create Trip</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
