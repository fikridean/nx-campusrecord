<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-lg-12">
                <table id="example" class="display nowrap" width="100%">
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
                                <td>{{ $user->address }} {{ $user->rt_number }} {{ $user->rw_number }}
                                    {{ $user->village }}
                                    {{ $user->district }} {{ $user->city }} {{ $user->province }}</td>
                                <td><a href="{{ $user->map_url }}" target="_">Gmaps</a></td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}">Detail</a>
                                    <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
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

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('logout') }}" method="post">
                    @csrf

                    <button type="submit">
                        Exit
                    </button>
                </form>
            </div>
        </div>
    </div>




    <script>
        var table = new DataTable('#example');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
