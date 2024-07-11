<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Residence;
use Exception;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Residence::select('id', 'name')->get();

        return view('pages.user.residence.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.residence.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        try {
            $data = $request->all();
            Residence::create($data);

            return redirect()->route('user.residence.index')->with('success', 'Perumahan berhasil ditambahkan!!');
        } catch (Exception $e) {
            return redirect()->route('user.residence.index')->with('error', 'Perumahan Gagal ditambahkan!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Residence::findOrFail($id);

        return view('pages.user.residence.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Residence::findOrFail($id);

        return view('pages.user.residence.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        try {
            $residence = Residence::findOrFail($id);

            $data = $request->all();

            $residence->update($data);

            return redirect()->route('user.residence.index')->with('success', 'Perumahan berhasil diupdate!!');
        } catch (Exception $e) {
            return redirect()->route('user.residence.index')->with('error', 'Perumahan Gagal diupdate!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $residence = Residence::findOrFail($id);

            $residence->delete();

            return redirect()->route('user.residence.index')->with('success', 'Perumahan berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('user.residence.index')->with('error', 'Perumahan Gagal dihapus!!');
        }
    }
}
