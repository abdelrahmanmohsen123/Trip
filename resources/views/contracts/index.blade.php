@extends('layouts.app')

@section('title', 'List Contracts')

@section('content')


    <!-- Your contract creation form HTML goes here -->
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>Contracts</h1>
            </div>
            <div class="col-2">
                <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Create Contract</a>

            </div>
        </div>


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Contract Number</th>
                    <th>Client Name</th>
                    <th>Trips Count</th>
                    <th>Ended Trips Count</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contracts as $contract)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $contract->contract_number }}</td>
                        <td>{{ $contract->client->name }}</td>
                        {{-- <td>{{ $contract->trips_count }}</td> --}}
                        <td>{{ ($contract->trips) ? $contract->trips->count()  : '0'    }}</td>

                        <td>{{ ($contract->trips) ? $contract->trips->where('trip_date', '<', now())->count() : '0' }}</td> <!-- Ended trips count -->
                        <td>{{ $contract->start_date }}</td>
                        <td>{{ $contract->end_date }}</td>
                        <td>
                            @if($contract->trips->count() > 0)
                                @if ($contract->trips->count() == $contract->trips->where('trip_date', '<', now())->count() )
                                        <p class="btn btn-success">Completed</p>
                                @else
                                <p class="btn btn-warning">Current</p>
                                @endif
                            @else
                            <p class="btn btn-danger">Not Trip Yet</p>
                            @endif
                            {{-- <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-info">View</a> --}}
                            {{-- <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-primary">Edit</a> --}}
                            {{-- <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    @empty
                    <tr class="m-auto text-center">
                        <td colspan="5">
                            <p class="btn btn-warning">Not Found Contract</p>


                          </td>
                    </tr>

                    @endforelse
            </tbody>
        </table>
        {{ $contracts->links('pagination::bootstrap-5') }} <!-- Display pagination links -->
    </div>
@endsection
