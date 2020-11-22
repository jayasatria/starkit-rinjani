<div class="container">
    <div class="row">
        <h2>Edit Pekerjaan</h2>
    </div>

    <form action="<?= base_url('admin/editPekerjaan/') . $pekerjaan['id']; ?>" method="POST">
        <div class="form-group">
            <label for="nama_pekerjaan">Nama Pekerjaan</label>
            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" value="<?= $pekerjaan['nama_pekerjaan']; ?>">
        </div>
        <div class="form-group">
            <label for="no_kontrak">Nomor Kontrak</label>
            <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" value="<?= $pekerjaan['no_kontrak']; ?>">
        </div>
        <div class="form-group">
            <label for="vendor">Vendor</label>
            <input type="text" class="form-control" id="vendor" name="vendor" value="<?= $pekerjaan['vendor']; ?>">
        </div>
        <div class="form-group">
            <label for="tgl_mulai">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= $pekerjaan['tgl_mulai']; ?>">
        </div>
        <div class="form-group">
            <label for="tgl_selesai">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= $pekerjaan['tgl_selesai']; ?>">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"><?= $pekerjaan['deskripsi']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>