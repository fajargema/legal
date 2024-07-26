@extends('layouts.admin')

@section('title', 'Tambah Legal')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Legal</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.legal.index') }}">Data Legal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" method="POST" action="{{ route('user.legal.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Perumahan</label>
                                <select class="form-select" name="residence_id">
                                    <option selected>Pilih Perumahan</option>
                                    @foreach ($residences as $residence)
                                    <option value="{{ $residence->id }}">{{ $residence->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Tipe Rumah</label>
                                <input type="text" class="form-control" name="residence_type" placeholder="Tipe Rumah">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="name"
                                    placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" name="nik" placeholder="NIK">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Pekerjaan</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="karyawan" class="selectgroup-input"
                                            checked>
                                        <span class="selectgroup-button">Karyawan</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="wiraswasta"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Wiraswasta</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Kartu Konsumen</label>
                                <input type="file" class="form-control" name="kartu_konsumen">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Memo Persetujuan Penjualan</label>
                                <input type="file" class="form-control" name="mpp">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Form Pengajuan Akad</label>
                                <input type="file" class="form-control" name="fpa">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Surat Penegasan Persetujuan Penyediaan Kredit</label>
                                <input type="file" class="form-control" name="sp3k">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Data Diri</label>
                                <input type="file" class="form-control" name="data_diri">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Persetujuan Konsumen</label>
                                <input type="file" class="form-control" name="pk">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Sertifikat</label>
                                <input type="file" class="form-control" name="sertifikat">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Surat Penawaran Rumah</label>
                                <input type="file" class="form-control" name="spr">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Bea Perolehan Hak atas Tanah dan Bangunan</label>
                                <input type="file" class="form-control" name="bphtb">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Akta Jual Beli</label>
                                <input type="file" class="form-control" name="ajb">
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
