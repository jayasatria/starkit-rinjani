<div class="container">
    <h1>Detail Pekerjaan <?= $pekerjaan['nama_pekerjaan']; ?></h1>
    <a href="<?= base_url('admin/add_job'); ?>" class="btn btn-primary mb-2">Tambah Job</a>
    <?= $this->session->flashdata('message'); ?>

    <table class="table table-bordered">

        <tr>
            <th scope="col">Nama Pekerjaan</th>
            <td><?= $pekerjaan['nama_pekerjaan']; ?></td>
        </tr>
        <tr>
            <th scope="col">Nomor Kontrak</th>
            <td><?= $pekerjaan['no_kontrak']; ?></td>
        </tr>
        <tr>
            <th scope="col">Vendor</th>
            <td><?= $pekerjaan['vendor']; ?></td>
        </tr>
        <tr>
            <th scope="col">Username</th>
            <td><?= $pekerjaan['user_name']; ?></td>
        </tr>
        <tr>
            <th scope="col">Password</th>
            <td><?= $pekerjaan['password']; ?></td>
        </tr>
        <tr>
            <th scope="col">Tanggal Mulai</th>
            <td><?= $pekerjaan['tgl_mulai']; ?></td>
        </tr>
        <tr>
            <th scope="col">Tanggal Selesai</th>
            <td><?= $pekerjaan['tgl_selesai']; ?></td>
        </tr>

    </table>
</div>