<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index () {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('user.index', [
            'users' => User::latest()->get(),
        ]);
    }

    public function add () {
        return view('user.add');
    }

    public function save(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'section' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'password' => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'section' => $request->section,
            'position' => $request->position,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('user.index', absolute: false))->with('success', 'Data successfully added');
    }

    public function edit (User $user) {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'section' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
        ]);


        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'section' => $request->section,
            'position' => $request->position,
        ]);

        return redirect(route('user.index', absolute: false))->with('success', 'Data successfully updated');

    }

    public function destroy(User $user) {
        try{
            User::where('id', $user->id)->delete();
        } catch (\Illuminate\Database\QueryException){
            return back()->with([
                'error' => 'Data cannot be deleted, because the data is still needed!',
            ]);
        }

        return redirect(route('user.index', absolute: false))->with('success', 'Data deleted successfully');
    }
}
