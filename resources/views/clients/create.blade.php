

@extends('layouts.app')

@section('title', 'Create Clients')

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

                        <form method="POST" action="{{ route('clients.store') }}">
                            @csrf


                            <div class="form-group my-3">
                                <label for="name">Client Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary my-2">Create Client</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
