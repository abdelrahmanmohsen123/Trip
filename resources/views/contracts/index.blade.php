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
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $contract->contract_number }}</td>
                        <td>{{ $contract->client->name }}</td>
                        <td>{{ $contract->trips_count }}</td>
                        <td>{{ $contract->start_date }}</td>
                        <td>{{ $contract->end_date }}</td>
                        <td>
                            {{-- <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-info">View</a> --}}
                            {{-- <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-primary">Edit</a> --}}
                            <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contracts->links('pagination::bootstrap-5') }} <!-- Display pagination links -->
    </div>
@endsection
