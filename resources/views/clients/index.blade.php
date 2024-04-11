@extends('layouts.app')

@section('title', 'List Clients')

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
                <h1><ul>List Clients</ul></h1>
            </div>
            <div class="col-2">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Create Client</a>

            </div>
        </div>




        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $client->name }}</td>
                        <td>
                            {{-- <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">View</a> --}}
                            {{-- <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Edit</a> --}}
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $clients->links(('pagination::bootstrap-5')) }} <!-- Display pagination links -->
    </div>
@endsection
