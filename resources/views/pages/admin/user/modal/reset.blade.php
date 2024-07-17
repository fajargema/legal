<div class="modal fade text-left" id="resetModal{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Reset Password</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('admin.user.reset-password', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label>Nama Lengkap</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $item->name }}" readonly>
                    </div>
                    <label>Password Baru</label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
