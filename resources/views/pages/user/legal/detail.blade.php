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
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.legal.index') }}">Data Legal</a></li>
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

                    <h5>Perumahan</h5>
                    <p>{{ $data->residence->name }}</p>
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
                            <td>
                                @if (isset($data->$key))
                                <a href="{{ asset('storage/dokumen/' . $data->$key) }}" target="_blank"
                                    class="btn icon icon-left btn-danger">
                                    <i data-feather="file-text"></i>
                                </a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('user.legal.edit-document', $data->id) }}" class="d-flex"
                                    method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="file" class="form-control" style="margin-right: 2%" name="doc">
                                    <button type="submit" class="btn icon btn-primary" name="btname"
                                        value="{{ $key }}"><i data-feather="edit"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless table-striped table-hover">

                        @foreach ($documents2 as $key => $value)
                        <tr>
                            <td><b>{{ $value }}</b></td>
                            <td>
                                @if (isset($data->$key))
                                <a href="{{ asset('storage/dokumen/' . $data->$key) }}" target="_blank"
                                    class="btn icon icon-left btn-danger">
                                    <i data-feather="file-text"></i>
                                </a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('user.legal.edit-document', $data->id) }}" class="d-flex"
                                    method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="file" class="form-control" style="margin-right: 2%" name="doc">
                                    <button type="submit" class="btn icon btn-primary" name="btname"
                                        value="{{ $key }}"><i data-feather="edit"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>

</section>

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
