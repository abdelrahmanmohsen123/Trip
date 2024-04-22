@extends('layouts.app')

@section('title', 'Create Contract')
<style>
    #contract_form {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style for form labels */
label {
    display: block;
    margin-bottom: 5px;
}

/* Style for text inputs */
input[type="text"],
input[type="date"],
input[type="number"],
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Ensure padding and border are included in the width */
}

/* Style for button */
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
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



            <div id="trip_dates_container">
                <!-- Dynamic trip_dates inputs will be added here -->
            </div>




            <button type="submit" class="btn btn-primary my-2">Create Contract</button>
        </form>
    </div>

    <script>
        document.getElementById('trips_count').addEventListener('change', function () {
            const tripsCount = parseInt(this.value);
        const tripDatesContainer = document.getElementById('trip_dates_container');
        tripDatesContainer.innerHTML = '';

        for (let i = 0; i < tripsCount; i += 2) {
            const rowWrapper = document.createElement('div');
            rowWrapper.classList.add('row', 'mb-2'); // Add Bootstrap classes for a row and margin-bottom

            for (let j = 0; j < 2; j++) {
                if (i + j < tripsCount) {
                    const tripDateInput = document.createElement('input');
                    tripDateInput.type = 'date';
                    tripDateInput.name = 'trip_dates[]';
                    tripDateInput.placeholder = 'Trip Date ' + (i + j + 1);
                    tripDateInput.classList.add('form-control', 'col-6'); // Add Bootstrap classes for input styling and column width
                    tripDateInput.required = true; // Add the required attribute
                    const colWrapper = document.createElement('div');
                    colWrapper.classList.add('col'); // Add Bootstrap class for a column
                    colWrapper.appendChild(tripDateInput);

                    rowWrapper.appendChild(colWrapper);
                }
            }

            tripDatesContainer.appendChild(rowWrapper);
        }
        });
    </script>
@endsection
