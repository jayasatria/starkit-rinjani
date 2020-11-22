<div class="container">
    <div class="row">

        <h1>Detail Pekerjaan </h1>

    </div>
    <a href="<?= base_url('user/rendal'); ?>" class="badge badge-primary">Back <i class="fas fa-reply"></i></a>
    <?= $this->session->flashdata('message'); ?>

    <table class="table mt-5">

        <tr>
            <th scope="col" style="width: 150px;">Nama Pekerjaan</th>
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
        <tr>
            <th scope="col">Deskripsi Pekerjaan</th>
            <td><?= $pekerjaan['deskripsi']; ?></td>
        </tr>

    </table>

</div>