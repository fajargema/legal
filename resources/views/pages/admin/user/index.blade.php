@extends('layouts.admin')

@section('title', 'Pengguna')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Pengguna</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.user.create') }}" class="btn icon icon-left btn-primary"><i
                    data-feather="plus"></i> Tambah Pengguna</a>
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->roles }}</td>
                        <td>{{ $item->position }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-dark shadow btn-sm sharp" data-toggle="tooltip"
                                    style="margin-right: 2%" title="Reset Password" data-bs-toggle="modal"
                                    data-bs-target="#resetModal{{ $item->id }}">
                                    <i data-feather="tool"></i>
                                </button>
                                @include('pages.admin.user.modal.reset')
                                <a href="{{ route('admin.user.edit', $item->id) }}"
                                    class="btn btn-primary shadow btn-sm sharp" style="margin-right: 2%"
                                    data-toggle="tooltip" title='Edit'>
                                    <i data-feather="edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.user.destroy', $item->id) }}">
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
