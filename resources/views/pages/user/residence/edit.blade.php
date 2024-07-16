@extends('layouts.admin')

@section('title', 'Edit Perumahan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Perumahan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.residence.index') }}">Data Perumahan</a></li>
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
            <form class="form form-vertical" method="POST" action="{{ route('user.residence.update', $data->id) }}">
                @method('PUT')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama Perumahan</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="name"
                                    placeholder="Nama Perumahan" value="{{ old('name') ?? $data->name }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Alamat Perumahan</label>
                                <textarea name="address" rows="5"
                                    class="form-control">{{ old('address') ?? $data->address }}</textarea>
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
