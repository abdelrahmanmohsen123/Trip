@extends('layouts.app')

@section('title', 'List Trips')

@section('content')
    <!-- Your contract creation form HTML goes here -->
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row my-3">
            <div class="col-10">
                <h1><ul>List Trips</ul></h1>
            </div>
            <div class="col-2">
                <a href="{{ route('trips.create') }}" class="btn btn-primary">Create Trip</a>

            </div>
        </div>




        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Contract number</th>
                    <th>Client Name</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @forelse($trips as $trip)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $trip->trip_date }}</td>
                        <td>{{ $trip->contract->contract_number }}</td>
                        <td>{{ $trip->contract->client->name }}</td>

                        <td>
                            {{-- <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">View</a> --}}
                            {{-- <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Edit</a> --}}
                            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr class="m-auto text-center">
                    <td colspan="5">
                        <p class="btn btn-warning">Not Found Trip</p>


                      </td>
                </tr>

                @endforelse
            </tbody>
        </table>

        {{ $trips->links(('pagination::bootstrap-5')) }} <!-- Display pagination links -->
    </div>
@endsection
