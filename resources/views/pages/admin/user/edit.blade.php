@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Pengguna</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Data Pengguna</a></li>
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
            <form class="form form-vertical" method="POST" action="{{ route('admin.user.update', $data->id) }}">
                @method('PUT')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{
                                    old('name') ?? $data->name }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{
                                    old('username') ?? $data->username }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-Mail" value="{{
                                    old('email') ?? $data->email }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="position" placeholder="Jabatan" value="{{
                                    old('position') ?? $data->position }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-select" name="roles">
                                    <option>Pilih Role</option>
                                    <option value="owner" {{ $data->roles == 'owner' ? 'selected' : '' }}>Owner</option>
                                    <option value="admin" {{ $data->roles == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $data->roles == 'user' ? 'selected' : '' }}>User</option>
                                </select>
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
