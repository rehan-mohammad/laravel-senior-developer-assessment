<?php

namespace App\Http\Controllers;

use App\Events\UserSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'prefixname' => 'nullable',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'suffixname' => 'nullable',
            'photo' => 'nullable',
            'type' => 'nullable',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Set the default value for 'type' if not set
        $validatedData['type'] = $validatedData['type'] ?? 'user';

        // Create the user
        $user = User::create($validatedData);
        event(new UserSaved($user));

        // Redirect the user after successful creation
        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'prefixname' => 'nullable',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'suffixname' => 'nullable',
            'photo' => 'nullable',
            'type' => 'nullable',
        ]);

        $user->update($validatedData);
        event(new UserSaved($user));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function permaDestroy($id)
    {
        User::withTrashed()->find($id)->forceDelete();

        return redirect()->route('users.trashed')->with('success', 'User permanently deleted successfully.');
    }

    public function trashedUsers()
    {
        $users = User::onlyTrashed()->get();

        return view('users.trashed', compact('users'));
    }

    public function restoreTrashed($id)
    {
        User::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success', 'User has been restored successfully.');
    }
}
