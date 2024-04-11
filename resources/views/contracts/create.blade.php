@extends('layouts.app')

@section('title', 'Create Contract')

@section('content')
    <!-- Your contract creation form HTML goes here -->
    <div class="container">
        <h1>Create Contract</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('contracts.store') }}">
            @csrf



            <div class="row my-2">
                <div class="col-6">
                    <div class="form-group">
                        <label for="client_id">Client :</label>
                        <select name="client_id" id="client_id" class="form-control">
                            <option  disabled selected>Choose client ....</option>
                            @forelse ($clients as $client)
                                <option value="{{$client->id}}">{{ $client->name }}</option>
                            @empty
                                <option value="">No client Found</option>
                            @endforelse
                        </select>
                        {{-- <input type="text" name="client_id" id="client_id" class="form-control" required> --}}
                    </div>
                </div>
                <div class="col-6">


                    <div class="form-group">
                        <label for="trips_count">Trips Count:</label>
                        <input type="number" placeholder="Number Count Trips ..." name="trips_count" id="trips_count" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-6">
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                </div>
            </div>




            <button type="submit" class="btn btn-primary my-2">Create Contract</button>
        </form>
    </div>
@endsection
