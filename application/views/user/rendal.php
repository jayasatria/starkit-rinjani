<div class="container">
    <h1>Daftar Pekerjaan</h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pekerjaan</th>
                    <th scope="col">Nomor Kontrak</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Detail</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pekerjaan as $p) :
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $p['nama_pekerjaan']; ?></td>
                        <td><?= $p['no_kontrak']; ?></td>
                        <td><?= $p['vendor']; ?></td>
                        <td><a href="<?= base_url('user/detail/') . $p['id']; ?>" class="badge badge-success">Detail</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>