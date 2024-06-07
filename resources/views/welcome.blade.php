<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: url('https://www.toptal.com/designers/subtlepatterns/patterns/double-bubble-outline.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: rgba(0, 123, 255, 0.9);
        }

        .navbar-brand,
        .nav-link,
        .btn-outline-danger {
            color: #ffffff !important;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #cce7ff !important;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #0056b3;
            color: #ffffff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e3f2fd;
        }

        .btn-info {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .btn-info:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            border-radius: 5px;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-outline-danger {
            border-color: #ffffff;
            border-radius: 5px;
        }

        .btn-outline-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        h1,
        h2 {
            color: #0056b3;
            font-weight: bold;
        }

        form {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="mb-5 p-3 w-screen d-flex justify-content-between">
        <div class="d-flex">
            <h4>Find Your Mate Homes</h4>
        </div>
        <div class="d-flex flex-row-reverse">
            <a class="btn mx-2 btn-outline-secondary" href="{{ route('register') }}">Register</a>
            <a class="btn mx-2 btn-outline-primary" href="{{ route('login') }}">Login</a>
        </div>
    </div>
    <div class="container">
        <h1 class="mb-4">Users Details</h1>

        <form class="d-flex my-4" action="{{ route('landingPage') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2"
                placeholder="Search your friends by username, email, or NIM"
                @isset($query) value="{{ old('query', $query) }}" @endisset>
            <button type="submit" class="btn btn-warning text-white">Search</button>
        </form>

        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gmaps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nim }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->address }} {{ $user->rt_number }} {{ $user->rw_number }}
                                        {{ $user->village }} {{ $user->district }} {{ $user->city }}
                                        {{ $user->province }}</td>
                                    <td><a class="btn text-white btn-success btn-sm" href="{{ $user->map_url }}"
                                            target="_blank">Gmaps</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        var table = new DataTable('#example');
    </script>
</body>

</html>
