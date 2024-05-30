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
    <h1>User Detail</h1>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('user.destroy', $user->id) }}" method="post">
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>
    </form>

    <ul class="list-group">
        <li class="list-group-item">{{ $user->nim }}</li>
        <li class="list-group-item">{{ $user->name }}</li>
        <li class="list-group-item">{{ $user->email }}</li>
        <li class="list-group-item">{{ $user->date_of_birth }}</li>
        <li class="list-group-item">{{ $user->phone_number }}</li>
        <li class="list-group-item">{{ $user->hobby }}</li>
        <li class="list-group-item">{{ $user->address }}</li>
        <li class="list-group-item">{{ $user->rt_number }}</li>
        <li class="list-group-item">{{ $user->rw_number }}</li>
        <li class="list-group-item">{{ $user->village }}</li>
        <li class="list-group-item">{{ $user->district }}</li>
        <li class="list-group-item">{{ $user->city }}</li>
        <li class="list-group-item">{{ $user->province }}</li>
        <li class="list-group-item">{{ $user->map_url }}</li>

    </ul>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
