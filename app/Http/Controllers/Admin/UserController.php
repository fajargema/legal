<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::get();

        return view('pages.admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email',
            'password' => 'required|string',
            'roles' => 'required|string',
            'position' => 'required|string'
        ]);
        try {
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            User::create($data);

            return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil ditambahkan!!');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Pengguna Gagal ditambahkan!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);

        return view('pages.admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $id,
            'email' => 'required|email',
            'roles' => 'required|string',
            'position' => 'required|string'
        ]);
        try {
            $user = User::findOrFail($id);
            $data = $request->all();
            $user->update($data);

            return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil diubah!!');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Pengguna Gagal diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index')->with('error', 'Pengguna Gagal dihapus!!');
        }
    }
}
