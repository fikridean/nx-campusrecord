<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit User</h1>

        <form id="signupForm" action="{{ route('user.update', $user) }}" method="POST" class="row g-3">
            @method('patch')
            @csrf

            <!-- Section 1 -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Personal Information</h5>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            @can('isAdmin')
                                <input type="text" name="nim" id="nim" class="form-control"
                                    placeholder="Enter your nim" value="{{ old('nim', $user->nim) }}" required>
                                @session('errornim')
                                    <div class="text-danger">{{ session('errornim') }}</div>
                                @endsession
                                @error('nim')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            @endcan

                            @can('isStudent')
                                <input type="text" name="nim" id="nim" class="form-control"
                                    value="{{ $user->nim }}" disabled>
                            @endcan

                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            @can('isAdmin')
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter your email" value="{{ old('email', $user->email) }}" required>
                                @session('erroremail')
                                    <div class="text-danger">{{ session('erroremail') }}</div>
                                @endsession
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            @endcan

                            @can('isStudent')
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{ $user->email }}" disabled>
                            @endcan

                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your name" required value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required
                                value="{{ old('date_of_birth', $user->date_of_birth) }}">
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" pattern="\+62[0-9]{10,13}"
                                placeholder="+6288117628802" class="form-control" required
                                value="{{ old('phone_number', $user->phone_number) }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Additional Information</h5>
                        <div class="mb-3">
                            <label for="hobby" class="form-label">Hobby</label>
                            <input type="text" id="hobby" name="hobby" class="form-control"
                                placeholder="Enter your hobby" required value="{{ old('hobby', $user->hobby) }}">
                            @error('hobby')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="map_url" class="form-label">URL Map</label>
                            <input type="url" id="map_url" name="map_url" class="form-control"
                                placeholder="Enter your Gmaps link location" required
                                value="{{ old('map_url', $user->map_url) }}">
                            @error('map_url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @can('isAdmin')
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role_id" class="form-select" required>
                                    <option value="1" {{ old('role_id', $user->role_id) == 1 ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="2" {{ old('role_id', $user->role_id) == 2 ? 'selected' : '' }}>
                                        Student</option>
                                </select>
                                @error('role_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Address</h5>
                        <div class="mb-3">
                            <label for="address" class="form-label">Street Name</label>
                            <input type="text" id="address" name="address" class="form-control"
                                placeholder="Enter your address" required
                                value="{{ old('address', $user->address) }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rt_number" class="form-label">RT Number</label>
                            <input type="text" id="rt_number" name="rt_number" class="form-control"
                                placeholder="Enter your RT number" required
                                value="{{ old('rt_number', $user->rt_number) }}">
                            @error('rt_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rw_number" class="form-label">RW Number</label>
                            <input type="text" id="rw_number" name="rw_number" class="form-control"
                                placeholder="Enter your RW number" required
                                value="{{ old('rw_number', $user->rw_number) }}">
                            @error('rw_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="village" class="form-label">Village</label>
                            <input type="text" id="village" name="village" class="form-control"
                                placeholder="Enter your village" required
                                value="{{ old('village', $user->village) }}">
                            @error('village')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" name="district" class="form-control"
                                placeholder="Enter your district" required
                                value="{{ old('district', $user->district) }}">
                            @error('district')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" name="city" class="form-control"
                                placeholder="Enter your city" required value="{{ old('city', $user->city) }}">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" id="province" name="province" class="form-control"
                                placeholder="Enter your province" required
                                value="{{ old('province', $user->province) }}">
                            @error('province')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-grid">
                            <a class="btn text-white text-2xl btn-success btn-sm mb-3"
                                href="{{ route('dashboard') }}">Back</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mt-3">
                                Update User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
