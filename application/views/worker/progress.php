<?php

use SebastianBergmann\Diff\Diff;

$tgl1 = new DateTime($pekerjaan['tgl_mulai']);

$tgl2 = new DateTime($pekerjaan['tgl_selesai']);

$durasi = $tgl2->diff($tgl1)->days + 1;


?>
<div class="container mt-auto">
    <table class="table table-light table-responsive table-striped table-bordered table-sm text-center" style="font-size: 9px; margin-top: 90px; ">
        <thead>
            <tr>
                <th>Pekerjaan Utama</th>
                <th>Uraian Pekerjaan</th>
                <th>Durasi</th>
                <th>Bobot</th>
                <?php for ($i = 1; $i <= $durasi; $i++) { ?>
                    <th><?= $i; ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($progress as $p) : ?>

                <tr>
                    <td><b>
                            <?php $pu = $this->db->get_where('pekerjaan_' . $pekerjaan['id'], ['id' => $p['id'] - 1])->row_array();
                            if ($pu['pekerjaan_utama'] == $p['pekerjaan_utama']) {
                                echo "";
                            } else {
                                echo $p['pekerjaan_utama'];
                            }
                            ?></b>

                    </td>
                    <td><?= $p['uraian_pekerjaan']; ?></td>
                    <td><?= $p['durasi']; ?></td>
                    <td><?= $p['bobot']; ?></td>
                    <?php for ($i = 1; $i <= $durasi; $i++) { ?>
                        <td><?= $p['hari_' . $i]; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#progressModal<?= $p['id']; ?>">Action</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php foreach ($progress as $p) : ?>
    <!-- Modal -->
    <div class="modal fade" id="progressModal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url('job/update_action/') . $p['id']; ?>" class="form-control" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Progress: <?= $p['uraian_pekerjaan']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="hari_ke" class="form-control">Dikerjakan pada hari ke-</label>
                        <select name="hari_ke" id="hari_ke" class="form-control">
                            <option value="" class="form-control">pilih hari ke-</option>
                            <?php for ($i = 1; $i <= $durasi; $i++) { ?>

                                <option value="<?= $i; ?>" class="form-control">Hari ke - <?= $i; ?></option>
                            <?php } ?>
                        </select>
                        <label for="bobot" class="form-control mt-2">Bobot pekerjaan</label>
                        <input type="text" class="form-control" name="bobot" id="bobot">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>