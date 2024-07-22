@extends('layouts.admin')

@section('title', 'Report Excel')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Report Excel</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report Excel</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            Lengkapi data berikut untuk membuat laporan excel
        </div>
        <div class="card-body">
            <form action="{{ route('user.legal.export-excel') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_date">Perumahan</label>
                            <select name="residence_id" class="form-control" style="margin-right: 2%" required>
                                <option value="all">Semua Perumahan</option>
                                @foreach ($residences as $residence)
                                <option value="{{ $residence->id }}">{{ $residence->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_date">Mulai Tanggal</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end_date">Hingga Tanggal</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn icon icon-left btn-success">
                    <i class="fa-regular fa-file-excel"></i> Download
                </button>
            </form>
        </div>
    </div>

</section>
@endsection
