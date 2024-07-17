@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Pengguna</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Data Pengguna</a></li>
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
            <form class="form form-vertical" method="POST" action="{{ route('admin.user.store') }}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-Mail">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="position" placeholder="Jabatan">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-select" name="roles">
                                    <option selected>Pilih Role</option>
                                    <option value="owner">Owner</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
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
