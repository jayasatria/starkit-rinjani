<div class="container">
    <div class="col-lg-10 mb-2">
        <form action="<?= base_url('admin/add_job'); ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pekerjaan</label>
                <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan">
                <small id="emailHelp" class="form-text text-muted">Nama pekerjaan sesuai dengan kontrak</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nomor Kontrak</label>
                <input type="text" class="form-control" id="no_kontrak" name="no_kontrak">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Vendor</label>
                <input type="text" class="form-control" id="vendor" name="vendor">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>