<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use Exception;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Legal::with('user')->get();

        return view('pages.user.legal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.legal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
        ]);
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            Legal::create($data);

            return redirect()->route('user.legal.index')->with('success', 'Legal berhasil ditambahkan!!');
        } catch (Exception $e) {
            return redirect()->route('user.legal.index')->with('error', 'Legal Gagal ditambahkan!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Legal::with(['user'])->findOrFail($id);

        return view('pages.user.legal.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Legal::with(['user'])->findOrFail($id);

        return view('pages.user.legal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
        ]);
        try {
            $legal = Legal::with(['user'])->findOrFail($id);

            $data = $request->all();

            $legal->update($data);

            return redirect()->route('user.legal.index')->with('success', 'Legal berhasil diupdate!!');
        } catch (Exception $e) {
            return redirect()->route('user.legal.index')->with('error', 'Legal Gagal diupdate!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
