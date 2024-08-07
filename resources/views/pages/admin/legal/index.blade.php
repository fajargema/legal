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
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Legal</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('admin.legal.create') }}" class="btn icon icon-left btn-primary"><i
                            data-feather="plus"></i> Tambah Legal</a>
                </div>
                <div class="col-md-3">
                    <form action="{{ route('admin.legal.change-residence') }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <select name="residence_id" class="form-control" style="margin-right: 2%">
                                <option value="all">Semua Perumahan</option>
                                @foreach ($residences as $residence)
                                <option value="{{ $residence->id }}" {{ $residence_id==$residence->id ? 'selected' : ''
                                    }}>{{ $residence->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-info shadow btn-sm" data-toggle="tooltip" title='Save'>
                                <i data-feather="save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Dibuat Oleh</th>
                        <th>Perumahan</th>
                        <th>Tipe Rumah</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->residence->name }}</td>
                        <td>{{ $item->residence_type }}</td>
                        <td>
                            @if ($item->category == 'karyawan')
                            <span class="badge bg-info">Karyawan</span>
                            @else
                            <span class="badge bg-primary">Wiraswasta</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.legal.show', $item->id) }}"
                                    class="btn btn-secondary shadow btn-sm sharp" style="margin-right: 2%"
                                    data-toggle="tooltip" title='Detail'>
                                    <i data-feather="info"></i>
                                </a>
                                <a href="{{ route('admin.legal.edit', $item->id) }}"
                                    class="btn btn-primary shadow btn-sm sharp" style="margin-right: 2%"
                                    data-toggle="tooltip" title='Edit'>
                                    <i data-feather="edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.legal.destroy', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger shadow btn-sm sharp show_confirm"
                                        onclick="return confirm('Apakah kamu yakin?')" data-toggle="tooltip"
                                        title='Delete'>
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</section>

{{-- Delete --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    var $ = jQuery;
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>
@endsection
