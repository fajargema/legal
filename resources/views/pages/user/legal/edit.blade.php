@extends('layouts.admin')

@section('title', 'Edit Legal')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Legal</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.legal.index') }}">Data Legal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <form class="form form-vertical" method="POST" action="{{ route('user.legal.update', $data->id) }}">
                @method('PUT')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Perumahan</label>
                                <select class="form-select" name="residence_id">
                                    <option selected>Pilih Perumahan</option>
                                    @foreach ($residences as $residence)
                                    <option value="{{ $residence->id }}" {{ (old('residence_id')==$residence->id ||
                                        $data->residence_id
                                        ==
                                        $residence->id) ? 'selected' : '' }}>
                                        {{ $residence->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Tipe Rumah</label>
                                <input type="text" class="form-control" name="residence_type" placeholder="Tipe Rumah"
                                    value="{{ old('residence_type') ?? $data->residence_type }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                                    value="{{ old('name') ?? $data->name }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" name="nik" placeholder="NIK"
                                    value="{{ old('nik') ?? $data->nik }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Pekerjaan</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="karyawan" class="selectgroup-input"
                                            {{ $data->category == 'karyawan' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Karyawan</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="wiraswasta" class="selectgroup-input"
                                            {{ $data->category == 'wiraswasta' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Wiraswasta</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
