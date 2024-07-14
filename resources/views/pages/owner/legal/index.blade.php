@extends('layouts.admin')

@section('title', 'Legal')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Legal</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('owner.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Legal</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Perumahan</th>
                        <th>Dibuat Oleh</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->residence->name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            @if ($item->category == 'karyawan')
                            <span class="badge bg-info">Karyawan</span>
                            @else
                            <span class="badge bg-primary">Wiraswasta</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('owner.legal.show', $item->id) }}"
                                class="btn btn-secondary shadow btn-sm sharp" data-toggle="tooltip" title='Detail'>
                                <i data-feather="info"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
