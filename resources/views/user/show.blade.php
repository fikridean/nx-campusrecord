<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">User Detail</h1>

        <div class="d-flex mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary me-2">Back</a>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary me-2">Edit</a>
            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </div>

        <ul class="list-group">
            <li class="list-group-item"><strong>NIM:</strong> {{ $user->nim }}</li>
            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</li>
            <li class="list-group-item"><strong>Phone Number:</strong> {{ $user->phone_number }}</li>
            <li class="list-group-item"><strong>Hobby:</strong> {{ $user->hobby }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $user->address }}</li>
            <li class="list-group-item"><strong>RT Number:</strong> {{ $user->rt_number }}</li>
            <li class="list-group-item"><strong>RW Number:</strong> {{ $user->rw_number }}</li>
            <li class="list-group-item"><strong>Village:</strong> {{ $user->village }}</li>
            <li class="list-group-item"><strong>District:</strong> {{ $user->district }}</li>
            <li class="list-group-item"><strong>City:</strong> {{ $user->city }}</li>
            <li class="list-group-item"><strong>Province:</strong> {{ $user->province }}</li>
            <li class="list-group-item"><strong>Map URL:</strong> <a href="{{ $user->map_url }}" target="_blank">{{ $user->map_url }}</a></li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
