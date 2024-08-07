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
        $residences = Residence::select('id', 'name')->get();
        $residence_id = "all";

        return view('pages.admin.legal.index', compact('data', 'residences', 'residence_id'));
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
            'residence_type' => 'required|string',
            'name' => 'required|string',
            'nik' => 'required|string|unique:legals,nik',
            'category' => 'required|string',
            'kartu_konsumen' => 'mimes:pdf,docx|max:5048',
            'mpp' => 'mimes:pdf,docx|max:5048',
            'fpa' => 'mimes:pdf,docx|max:5048',
            'sp3k' => 'mimes:pdf,docx|max:5048',
            'data_diri' => 'mimes:pdf,docx|max:5048',
            'pk' => 'mimes:pdf,docx|max:5048',
            'sertifikat' => 'mimes:pdf,docx|max:5048',
            'spr' => 'mimes:pdf,docx|max:5048',
            'bphtb' => 'mimes:pdf,docx|max:5048',
            'ajb' => 'mimes:pdf,docx|max:5048',
        ]);
        try {
            $data = $request->all();

            if ($request->hasFile('kartu_konsumen')) {
                $kartu_konsumen = $request->file('kartu_konsumen');
                $kartu_konsumen->storeAs('public/dokumen', $kartu_konsumen->hashName());
                $data['kartu_konsumen'] = $kartu_konsumen->hashName();
            }
            if ($request->hasFile('mpp')) {
                $mpp = $request->file('mpp');
                $mpp->storeAs('public/dokumen', $mpp->hashName());
                $data['mpp'] = $mpp->hashName();
            }
            if ($request->hasFile('fpa')) {
                $fpa = $request->file('fpa');
                $fpa->storeAs('public/dokumen', $fpa->hashName());
                $data['fpa'] = $fpa->hashName();
            }
            if ($request->hasFile('sp3k')) {
                $sp3k = $request->file('sp3k');
                $sp3k->storeAs('public/dokumen', $sp3k->hashName());
                $data['sp3k'] = $sp3k->hashName();
            }
            if ($request->hasFile('data_diri')) {
                $data_diri = $request->file('data_diri');
                $data_diri->storeAs('public/dokumen', $data_diri->hashName());
                $data['data_diri'] = $data_diri->hashName();
            }
            if ($request->hasFile('pk')) {
                $pk = $request->file('pk');
                $pk->storeAs('public/dokumen', $pk->hashName());
                $data['pk'] = $pk->hashName();
            }
            if ($request->hasFile('sertifikat')) {
                $sertifikat = $request->file('sertifikat');
                $sertifikat->storeAs('public/dokumen', $sertifikat->hashName());
                $data['sertifikat'] = $sertifikat->hashName();
            }
            if ($request->hasFile('spr')) {
                $spr = $request->file('spr');
                $spr->storeAs('public/dokumen', $spr->hashName());
                $data['spr'] = $spr->hashName();
            }
            if ($request->hasFile('bphtb')) {
                $bphtb = $request->file('bphtb');
                $bphtb->storeAs('public/dokumen', $bphtb->hashName());
                $data['bphtb'] = $bphtb->hashName();
            }
            if ($request->hasFile('ajb')) {
                $ajb = $request->file('ajb');
                $ajb->storeAs('public/dokumen', $ajb->hashName());
                $data['ajb'] = $ajb->hashName();
            }

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
        $documents1 = [
            'kartu_konsumen' => 'Kartu Konsumen',
            'mpp' => 'Memo Persetujuan Penjualan',
            'fpa' => 'Form Pengajuan Akad',
            'sp3k' => 'Surat Penegasan Persetujuan Penyediaan Kredit',
            'data_diri' => 'Data Diri',
        ];
        $documents2 = [
            'pk' => 'Pernyataan Kredit',
            'sertifikat' => 'Sertifikat',
            'spr' => 'Surat Pernyataan Rumah',
            'bphtb' => 'Bukti Pembayaran BPHTB',
            'ajb' => 'Akta Jual Beli',
        ];

        return view('pages.admin.legal.detail', compact('data', 'documents1', 'documents2'));
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
            'residence_type' => 'required|string',
            'name' => 'required|string',
            'nik' => 'required|string|unique:legals,nik,' . $id,
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

    public function cancelDeleteLegal(string $id)
    {
        try {
            $delete_legal = DeleteLegal::with('user', 'legal')->findOrFail($id);
            $delete_legal->delete();

            return redirect()->route('admin.legal.index')->with('success', 'Pengajuan Hapus Legal berhasil dibatalkan!!');
        } catch (Exception $e) {
            return redirect()->route('admin.legal.index')->with('error', 'Pengajuan Hapus Legal Gagal dibatalkan!!');
        }
    }

    public function deleteLegalByReq(string $id)
    {
        try {
            $legal = Legal::with(['user'])->findOrFail($id);
            $delete_legal = DeleteLegal::with('user', 'legal')->where('legal_id', $id)->first();

            $legal->delete();
            $delete_legal->delete();

            return redirect()->route('admin.legal.index')->with('success', 'Legal berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('admin.legal.index')->with('error', 'Legal Gagal dihapus!!');
        }
    }

    public function editDocument(Request $request, string $id)
    {
        $request->validate([
            'doc' => 'required|mimes:pdf,docx|max:5048',
        ]);
        try {
            $legal = Legal::with(['user'])->findOrFail($id);

            $documents = ['kartu_konsumen', 'mpp', 'fpa', 'sp3k', 'data_diri', 'pk', 'sertifikat', 'spr', 'bphtb', 'ajb'];

            foreach ($documents as $document) {
                if ($document == $request->btname) {
                    $data = $request->all();
                    if (isset($legal->$document)) {
                        unlink("storage/dokumen/" . $legal->$document);
                    }

                    $doc = $request->file('doc');
                    $doc->storeAs('public/dokumen', $doc->hashName());
                    $data[$document] = $doc->hashName();

                    $legal->update($data);
                }
            }

            return redirect()->back()->with('success', 'Dokumen berhasil diupdate!!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Dokumen Gagal diupdate!!');
        }
    }

    public function changeResidence(Request $request)
    {
        $residence_id = $request->residence_id;
        if ($residence_id == "all") {
            return redirect()->route('admin.legal.index');
        } else {
            $data = Legal::with(['user', 'residence'])->where('residence_id', $residence_id)->get();
            $residences = Residence::select('id', 'name')->get();

            return view('pages.admin.legal.index', compact('data', 'residences', 'residence_id'));
        }
    }
}
