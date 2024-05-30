<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function dashboard($query = null)
    {
        if (Gate::allows('isAdmin')) {
            $users = User::all();
        } else {
            $users = User::where(['role_id' => 2])->get();
        }

        if ($query) {
            $users = User::where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')->orWhere('nim')->orWhere('address', 'like', '%' . $query . '%')->get();
        }

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Accessed user list'
        ]);

        if (Gate::allows('isAdmin')) {
            return view('dashboard', [
                'users' => $users,
                'activities' => ActivityLog::all()
            ]);
        } else {
            return view('dashboard', [
                'users' => $users,
                'activities' => ActivityLog::where(['user_id' => Auth::user()->id])->get()
            ]);
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!Gate::allows('isAdmin')) {

            if ($user->role_id == 1) {
                ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'activity' => 'Tried to access unauthorized user profile'
                ]);

                return redirect(Route('dashboard'));
            }

            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Accessed user profile'
            ]);

            return view('user.show', [
                'user' => User::find($id)
            ]);
        }

        $user = User::find($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Accessed user profile'
        ]);

        return view('user.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        if (!Gate::allows('isAdmin')) {

            if (Auth::id() != $id) {
                ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'activity' => 'Tried to access unauthorized user edit form'
                ]);

                return redirect(Route('dashboard'));
            }

            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Accessed user edit form'
            ]);

            return view('user.edit', [
                'user' => User::find($id)
            ]);
        }

        $user = User::find($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Accessed user edit form'
        ]);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('isAdmin')) {
            if (Auth::user()->id != $id) {
                ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'activity' => 'Tried to update unauthorized user profile'
                ]);

                return redirect(Route('dashboard'));
            }

            $validate = $request->validate([
                'name' => ['string', 'min:3', 'max:255'],
                'date_of_birth' => ['string', 'min:3', 'max:50'],
                'phone_number' => ['string', 'min:3', 'max:100'],
                'hobby' => ['string', 'min:3'],
                'address' => ['string', 'min:3', 'max:100'],
                'rt_number' => ['string', 'min:1', 'max:100'],
                'rw_number' => ['string', 'min:1', 'max:100'],
                'village' => ['string', 'min:3', 'max:100'],
                'district' => ['string', 'min:3', 'max:100'],
                'city' => ['string', 'min:3', 'max:100'],
                'province' => ['string', 'min:3', 'max:100'],
                'map_url' => ['string', 'min:3', 'max:100'],
            ]);
        } else {
            $validate = $request->validate([
                'role_id' => ['integer', 'min:1', 'max:2'],
                'name' => ['string', 'min:3', 'max:255'],
                'date_of_birth' => ['string', 'min:3', 'max:50'],
                'phone_number' => ['string', 'min:3', 'max:100'],
                'hobby' => ['string', 'min:3'],
                'address' => ['string', 'min:3', 'max:100'],
                'rt_number' => ['string', 'min:1', 'max:100'],
                'rw_number' => ['string', 'min:1', 'max:100'],
                'village' => ['string', 'min:3', 'max:100'],
                'district' => ['string', 'min:3', 'max:100'],
                'city' => ['string', 'min:3', 'max:100'],
                'province' => ['string', 'min:3', 'max:100'],
                'map_url' => ['string', 'min:3', 'max:100'],
            ]);
        }

        $user = User::find($id);
        $user->update($validate);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Updated user profile'
        ]);

        return redirect(Route('user.show', $id));
    }

    public function destroy($id)
    {
        if (!Gate::allows('isAdmin')) {
            if (Auth::user()->id != $id) {
                ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'activity' => 'Tried to update unauthorized user profile'
                ]);

                return redirect(Route('dashboard'));
            }
        }

        $user = User::find($id);
        $user->delete();

        return redirect(Route('dashboard'));
    }
}
