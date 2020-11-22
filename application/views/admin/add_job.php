<div class="container">
    <div class="col-lg-10 mb-2">
        <form action="<?= base_url('admin/add_job'); ?>" method="POST">
            <div class="form-group">
                <label for="nama_pekerjaan">Nama Pekerjaan</label>
                <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" required>
                <small id="emailHelp" class="form-text text-muted">Nama pekerjaan sesuai dengan kontrak</small>
            </div>
            <div class="form-group">
                <label for="no_kontrak">Nomor Kontrak</label>
                <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" required>
            </div>
            <div class="form-group">
                <label for="vendor">Nama Vendor</label>
                <input type="text" class="form-control" id="vendor" name="vendor" required>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                </div>
                <div class="form-group col-5">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
                </div>

            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Pekerjaan</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" class="form-control" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>