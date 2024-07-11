<?php

namespace App\Http\Controllers\User;

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
        $data = Legal::with('user', 'residence')->get();

        return view('pages.user.legal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $residences = Residence::select('id', 'name')->get();

        return view('pages.user.legal.create', compact('residences'));
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
        $residences = Residence::select('id', 'name')->get();
        $data = Legal::with(['user'])->findOrFail($id);

        return view('pages.user.legal.edit', compact('residences', 'data'));
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

    public function requestDelete(Request $request, string $id)
    {
        $request->validate([
            'reason' => 'required|string',
        ]);
        try {
            $deleteLegal = DeleteLegal::with('user', 'legal')->where('legal_id', $id)->first();
            if (isset($deleteLegal)) {
                return redirect()->route('user.legal.index')->with('error', 'Kamu sudah mengajukan hapus pada data ini!!');
            } else {
                $data = $request->all();
                $data['legal_id'] = $id;
                $data['user_id'] = auth()->id();
                DeleteLegal::create($data);
            }
            return redirect()->route('user.legal.index')->with('success', 'Pengajuan Hapus Legal Berhasil!!');
        } catch (Exception $e) {
            return redirect()->route('user.legal.index')->with('error', 'Pengajuan Hapus Legal Gagal!!');
        }
    }
}
