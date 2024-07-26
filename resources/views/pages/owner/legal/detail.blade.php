@extends('layouts.admin')

@section('title', 'Detail Legal')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Data Legal</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('owner.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('owner.legal.index') }}">Data Legal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Nama Lengkap</h5>
                    <p>{{ $data->name }}</p>

                    <h5>NIK</h5>
                    <p>{{ $data->nik }}</p>

                    <h5>Perumahan</h5>
                    <p>{{ $data->residence->name }} - {{ $data->residence_type }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Dibuat Oleh</h5>
                    <p>{{ $data->user->name }}</p>

                    <h5>Pekerjaan</h5>
                    <p>{{ $data->category }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-striped table-hover">

                        @foreach ($documents1 as $key => $value)
                        <tr>
                            <td><b>{{ $value }}</b></td>
                            <td><a href="{{ asset('storage/dokumen/' . $data->$key) }}" target="_blank"
                                    class="btn icon icon-left btn-danger"><i data-feather="file-text"></i></a></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless table-striped table-hover">

                        @foreach ($documents2 as $key => $value)
                        <tr>
                            <td><b>{{ $value }}</b></td>
                            <td><a href="{{ asset('storage/dokumen/' . $data->$key) }}" target="_blank"
                                    class="btn icon icon-left btn-danger"><i data-feather="file-text"></i></a></td>
                        </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection
