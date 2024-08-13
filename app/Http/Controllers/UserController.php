<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user) {
            return view('content.pages.pages-account-settings-account', compact('user'));
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'birthdate' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'password' => 'sometimes|nullable|min:8'
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->update();

        return redirect()->route('pages-account-settings-account', $id)->with('status', 'User updated successfully!');
    }


}
