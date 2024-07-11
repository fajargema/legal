<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeleteLegal;
use App\Models\Legal;
use App\Models\Residence;
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

        return view('pages.admin.legal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $residences = Residence::select('id', 'name')->get();

        return view('pages.admin.legal.create', compact('residences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'residence_id' => 'required',
            'name' => 'required|string',
            'category' => 'required|string',
        ]);
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            Legal::create($data);

            return redirect()->route('admin.legal.index')->with('success', 'Legal berhasil ditambahkan!!');
        } catch (Exception $e) {
            return redirect()->route('admin.legal.index')->with('error', 'Legal Gagal ditambahkan!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Legal::with(['user'])->findOrFail($id);

        return view('pages.admin.legal.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $residences = Residence::select('id', 'name')->get();
        $data = Legal::with(['user'])->findOrFail($id);

        return view('pages.admin.legal.edit', compact('data', 'residences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'residence_id' => 'required',
            'name' => 'required|string',
            'category' => 'required|string',
        ]);
        try {
            $legal = Legal::with(['user'])->findOrFail($id);

            $data = $request->all();

            $legal->update($data);

            return redirect()->route('admin.legal.index')->with('success', 'Legal berhasil diupdate!!');
        } catch (Exception $e) {
            return redirect()->route('admin.legal.index')->with('error', 'Legal Gagal diupdate!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $legal = Legal::with(['user'])->findOrFail($id);

            $legal->delete();

            return redirect()->route('admin.legal.index')->with('success', 'Legal berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('admin.legal.index')->with('error', 'Legal Gagal dihapus!!');
        }
    }

    public function listDeleteReq()
    {
        $data = DeleteLegal::with(['legal', 'user'])->get();

        return view('pages.admin.legal.delete', compact('data'));
    }

    public function deleteLegalByReq(string $id)
    {
        try {
            $legal = Legal::with(['user'])->findOrFail($id);
            $delete_legal = DeleteLegal::where('legal_id', $id)->first();

            $legal->delete();
            $delete_legal->delete();

            return redirect()->route('admin.legal.index')->with('success', 'Legal berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('admin.legal.index')->with('error', 'Legal Gagal dihapus!!');
        }
    }
}
