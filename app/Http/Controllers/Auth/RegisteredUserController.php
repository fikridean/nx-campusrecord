<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        if (Auth::check()) {
            return redirect(Route('dashboard'));
        }

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'nim' => ['required', 'string', 'min:3', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'min:3', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required', 'string', 'min:3', 'max:50'],
            'phone_number' => ['required', 'string', 'min:3', 'max:100'],
            'hobby' => ['required', 'string', 'min:3'],
            'address' => ['required', 'string', 'min:3', 'max:100'],
            'rt_number' => ['required', 'string', 'min:1', 'max:100'],
            'rw_number' => ['required', 'string', 'min:1', 'max:100'],
            'village' => ['required', 'string', 'min:3', 'max:100'],
            'district' => ['required', 'string', 'min:3', 'max:100'],
            'city' => ['required', 'string', 'min:3', 'max:100'],
            'province' => ['required', 'string', 'min:3', 'max:100'],
            'map_url' => ['required', 'string', 'min:3', 'max:100'],
        ]);

        $user = User::create($validate);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
