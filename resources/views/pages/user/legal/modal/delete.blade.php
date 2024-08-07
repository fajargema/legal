<div class="modal fade text-left" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Pengajuan Penghapusan Legal</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('user.legal.request-delete', $item->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Nama Lengkap</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $item->name }} - {{ $item->nik }}" readonly>
                    </div>
                    <label>Alasan</label>
                    <div class="form-group">
                        <textarea class="form-control" name="reason" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal"
                        onclick="return confirm('Apakah kamu yakin?')">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
