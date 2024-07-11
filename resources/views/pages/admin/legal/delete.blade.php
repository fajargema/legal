@extends('layouts.admin')

@section('title', 'Request Delete Legal')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Request Delete Legal</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Request Delete Legal</li>
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
                        <th>Diajukan Oleh</th>
                        <th>Alasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->legal->name }}</td>

                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->reason }}</td>
                        <td>
                            <div class="d-flex">
                                <form method="POST" style="margin-right: 2%"
                                    action="{{ route('admin.legal.cancel-delete', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary shadow btn-sm sharp show_confirm"
                                        data-toggle="tooltip" title='Cancel'>
                                        <i data-feather="x"></i>
                                    </button>
                                </form>
                                <form method="POST"
                                    action="{{ route('admin.legal.delete-by-request', $item->legal->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger shadow btn-sm sharp show_confirm"
                                        data-toggle="tooltip" title='Delete'>
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
