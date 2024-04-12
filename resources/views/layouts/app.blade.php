
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
    <!-- Add your stylesheets and scripts here -->
</head>
<body>
    <nav>
        <!-- Navigation links or menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{route('contracts.index')}}">
                <img src="{{asset('assets/task.jpg')}}" style="height: 30px" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="{{route('contracts.index')}}">Contract</a>
                  <a class="nav-link" href="{{route('trips.index')}}">Trip</a>
                  <a class="nav-link" href="{{route('clients.index')}}">Client</a>
                  {{-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> --}}
                </div>
              </div>
            </div>
          </nav>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer>
        <!-- Footer content -->
    </footer>

    <!-- Add your scripts here -->
</body>
</html>
