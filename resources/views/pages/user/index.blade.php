@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-title">
    <h3>Dashboard</h3>
</div>
<section class="section">
    <div class="row mb-2">
        <div class="col-12 col-md-4">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>PERUMAHAN</h3>
                            <div class="card-right d-flex align-items-center">
                                <p>{{ $count_residence }} Rumah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>Legal</h3>
                            <div class="card-right d-flex align-items-center">
                                <p>{{ $count_legal }} Data </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>Reports</h3>
                            <div class="card-right d-flex align-items-center">
                                <p>1,544 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Legal Terakhir</h4>
                <div class="d-flex ">
                    <a href="" class="btn btn-primary">More</a>
                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class='table mb-0' id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Perumahan</th>
                                <th>Dibuat Oleh</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($legal as $item)
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
