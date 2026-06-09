<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::with('branch')

            ->when($search, function ($query) use ($search) {

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            })

            ->latest()
            ->get();

        return view(
            'users.index',
            compact(
                'users',
                'search'
            )
        );
    }

    public function create()
    {
        $branches = Branch::all();

        return view('users.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'branch_id' => 'nullable'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'branch_id' => $request->branch_id,
        ]);

        \App\Helpers\ActivityLogger::log(
            'CREATE_USER',
            'Menambah user baru'
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $branches = Branch::all();

        return view('users.edit', compact(
            'user',
            'branches'
        ));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'branch_id' => $request->branch_id,
        ]);

        \App\Helpers\ActivityLogger::log(
            'UPDATE_USER',
            'Mengubah data user'
        );

        return redirect()
            ->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        \App\Helpers\ActivityLogger::log(
            'DELETE_USER',
            'Menghapus user'
        );

        return redirect()
            ->route('users.index');
    }
}