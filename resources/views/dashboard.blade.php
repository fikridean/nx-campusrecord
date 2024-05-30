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
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Exit</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Users Details</h1>

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nim }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->date_of_birth }}</td>
                                    <td>{{ $user->address }} {{ $user->rt_number }} {{ $user->rw_number }} {{ $user->village }} {{ $user->district }} {{ $user->city }} {{ $user->province }}</td>
                                    <td><a class="btn text-white btn-success btn-sm" href="{{ $user->map_url }}" target="_blank">Gmaps</a></td>
                                    <td>
                                        @can('isAdmin')
                                            <a href="{{ route('user.show', $user->id) }}"
                                                class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-secondary btn-sm">Edit</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endcan
                                        @can('isStudent')
                                            <a href="{{ route('user.show', $user->id) }}"
                                                class="btn btn-primary btn-sm">Detail</a>
                                            @can('update-user', $user)
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-secondary btn-sm">Edit</a>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endcan
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h2 class="mb-4">Users Activities</h2>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Accounts</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities->reverse()->take(10) as $activity)
                                <tr>
                                    <th scope="row">{{ $activity->user->name }}</th>
                                    <td>{{ $activity->activity }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                    <td>{{ $activity->updated_at }}</td>
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
