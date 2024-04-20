<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function view_user_list()
    {
        $users = User::where('role','0')->get();
        return view('user_list',compact('users'));

    }

    public function create_users(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'nic' => 'required|string',
            'phone' => 'required|numeric',

        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nic' => $request->input('nic'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'admin' => '0',
            'password' => '123456',
            'registered_at' => now(),
            'role' => '0',
        ]);

        $user->save();

        $request->session()->flash('success', 'User added successfully.');

        return back();
    }

    public function deleteUser(Request $request, $id)
    {
        try {
            $response = User::find($id);
            $response->delete();

            $request->session()->flash('delete', 'User DELETED.');
            return back();
        } catch (\Exception $error) {
            $request->session()->flash('Something goes wrong. Please try again');
            return back();
        }
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('edit_user', compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        $request->session()->flash('success', 'User updated successfully.');

        return back();
    }


}
