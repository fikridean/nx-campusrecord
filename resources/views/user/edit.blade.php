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
    <h1>User Edit</h1>

    <form id="signupForm" action="{{ route('user.update', $user) }}" method="POST">
        @method('patch')
        @csrf
        <div class="form-container">
            <!-- Section 1 -->
            <div id="section-1" class="form-section">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your name" required value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of
                        Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required value="{{ old('date_of_birth', $user->date_of_birth) }}">
                    @error('date_of_birth')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone
                        Number</label>
                    <input type="tel" id="phone_number" name="phone_number" pattern="+62[0-9]{12}"
                        placeholder="+6288117628802"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required value="{{ old('phone_number', $user->phone_number) }}">
                    @error('phone_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Section 2 -->
            <div id="section-2" class="form-section">
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Street
                        Name</label>
                    <input type="text" id="address" name="address"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your address" required value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rt_number" class="block text-sm font-medium text-gray-700">RT
                        Number</label>
                    <input type="text" id="rt_number" name="rt_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your RT number" required value="{{ old('rt_number', $user->rt_number) }}">
                    @error('rt_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="rw_number" class="block text-sm font-medium text-gray-700">RW
                        Number</label>
                    <input type="text" id="rw_number" name="rw_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your RW number" required value="{{ old('rw_number', $user->rw_number) }}">
                    @error('rw_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="village" class="block text-sm font-medium text-gray-700">Village</label>
                    <input type="text" id="village" name="village"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your village" required value="{{ old('village', $user->village) }}">
                    @error('village')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                    <input type="text" id="district" name="district"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your district" required value="{{ old('district', $user->district) }}">
                    @error('district')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" id="city" name="city"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your city" required value="{{ old('city', $user->city) }}">
                    @error('city')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                    <input type="text" id="province" name="province"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your province" required value="{{ old('province', $user->province) }}">
                    @error('province')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Section 3 -->
            <div id="section-3" class="form-section">
                <div class="mb-4">
                    <label for="hobby" class="block text-sm font-medium text-gray-700">Hobby</label>
                    <input type="text" id="hobby" name="hobby"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your hobby" required value="{{ old('hobby', $user->hobby) }}">
                    @error('hobby')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="map_url" class="block text-sm font-medium text-gray-700">URL
                        Map</label>
                    <input type="map_url" id="map_url" name="map_url"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Enter your gmaps link location" required
                        value="{{ old('map_url', $user->map_url) }}">
                    @error('map_url')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update user
                    </button>
                </div>
            </div>
        </div>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
