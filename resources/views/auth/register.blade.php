<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        .step {
            cursor: pointer;
            padding: 10px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 5px;
            margin: 0 5px;
        }

        .step.active {
            color: white;
            background-color: #3b82f6;
            /* Tailwind blue-500 */
        }

        .step-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-container {
            display: flex;
            transition: transform 0.3s ease-in-out;
        }

        .form-section {
            min-width: 100%;
            padding: 20px;
        }
    </style>
</head>

<body class="bg-blue-900">
    <div class="flex min-h-screen p-10 md:p-0">
        <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('image/signUp.png');"></div>
        <div class="flex flex-col items-center w-full md:w-1/2 bg-white p-8 rounded-2xl shadow-lg md:rounded-none">
            <div class="md:hidden flex justify-center items-center mb-5">
                <img src="image/smilegirl.jpg" alt="helloPerson" class="w-1/2 rounded-full">
            </div>
            <h1 class="text-3xl font-semibold mb-6 text-center">Lets Create your account</h1>
            <p class="mb-6 text-center">Please fill in the form to create account</p>
            <div class="w-full overflow-y-auto overflow-x-hidden">
                <form id="signupForm" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="form-container">
                        <!-- Section 1 -->
                        <div id="section-1" class="form-section">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your name" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                <input type="text" id="nim" name="nim"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your NIM" required value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" name="email" id="email"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" id="password" name="password"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your password" required>
                                @error('password')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700">Confirm
                                    Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your password" required>
                                @error('password_confirmation')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of
                                    Birth</label>
                                <input type="date" id="date_of_birth" name="date_of_birth"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required value="{{ old('date_of_birth') }}">
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
                                    required value="{{ old('phone_number') }}">
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
                                    placeholder="Enter your address" required value="{{ old('address') }}">
                                @error('address')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="rt_number" class="block text-sm font-medium text-gray-700">RT
                                    Number</label>
                                <input type="text" id="rt_number" name="rt_number"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your RT number" required value="{{ old('rt_number') }}">
                                @error('rt_number')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="rw_number" class="block text-sm font-medium text-gray-700">RW
                                    Number</label>
                                <input type="text" id="rw_number" name="rw_number"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your RW number" required value="{{ old('rw_number') }}">
                                @error('rw_number')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="village" class="block text-sm font-medium text-gray-700">Village</label>
                                <input type="text" id="village" name="village"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your village" required value="{{ old('village') }}">
                                @error('village')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                                <input type="text" id="district" name="district"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your district" required value="{{ old('district') }}">
                                @error('district')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" id="city" name="city"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your city" required value="{{ old('city') }}">
                                @error('city')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                <input type="text" id="province" name="province"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Enter your province" required value="{{ old('province') }}">
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
                                    placeholder="Enter your hobby" required value="{{ old('hobby') }}">
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
                                    value="{{ old('map_url') }}">
                                @error('map_url')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign
                                    Up</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <p class="mt-6 text-center text-sm text-gray-600">
                Have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign in
                    here</a>
            </p>
            <!-- Step Indicators -->
            <div class="step-container">
                <div id="step-1" class="step active" onclick="navigateTo(1)">1</div>
                <div id="step-2" class="step" onclick="navigateTo(2)">2</div>
                <div id="step-3" class="step" onclick="navigateTo(3)">3</div>
            </div>
        </div>
    </div>

    <script>
        const formContainer = document.querySelector('.form-container');
        const steps = document.querySelectorAll('.step');

        function navigateTo(step) {
            formContainer.style.transform = `translateX(-${(step - 1) * 100}%)`;
            steps.forEach((stepEl, index) => {
                if (index + 1 === step) {
                    stepEl.classList.add('active');
                } else {
                    stepEl.classList.remove('active');
                }
            });
        }
    </script>
</body>

</html>
