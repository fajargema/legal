<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        $data = Legal::with('user', 'residence')->get();

        return view('pages.owner.legal.index', compact('data'));
    }

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

        return view('pages.owner.legal.detail', compact('data', 'documents1', 'documents2'));
    }
}
