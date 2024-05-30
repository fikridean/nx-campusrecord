<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link href="https://nightly.datatables.net/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/dataTables.js"></script>

    <meta charset=utf-8 />
    <title>DataTables - JS Bin</title>

    <style>
        body {
            font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <table id="example" class="display nowrap" width="100%">
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
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ $user->address $user->rt_number $user->rw_number $user->village $user->district $user->city $user->province }}</td>
                    <td>{{ $user->gmaps }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        var table = new DataTable('#example');
    </script>
</body>

</html>