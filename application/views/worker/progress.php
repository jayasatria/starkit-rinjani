<?php

use SebastianBergmann\Diff\Diff;

$tgl1 = new DateTime($pekerjaan['tgl_mulai']);

$tgl2 = new DateTime($pekerjaan['tgl_selesai']);

$durasi = $tgl2->diff($tgl1)->days + 1;

// $tgl2->diff($tgl1)->days + 1;
?>
<div class="container">
    <table class="table table-bordered table-responsive table-sm" style="font-size: 8px;">
        <tr>
            <th>Pekerjaan Utama</th>
            <th>Uraian Pekerjaan</th>
            <th>Durasi</th>
            <th>Bobot</th>
            <?php for ($i = 1; $i <= $durasi; $i++) { ?>
                <th><?= $i; ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($progress as $p) : ?>
            <tr>
                <td>
                    <?php if ($p['pekerjaan_utama'] . $p['id'] == $p['pekerjaan_utama']) {
                        echo "";
                    } else {
                        echo $p['pekerjaan_utama'];
                    } ?>
                    <!-- <?= $p['pekerjaan_utama']; ?> -->
                </td>
                <td><?= $p['uraian_pekerjaan']; ?></td>
                <td><?= $p['durasi']; ?></td>
                <td><?= $p['bobot']; ?></td>
                <?php for ($i = 1; $i <= $durasi; $i++) { ?>
                    <td><?= $p['hari_' . $i]; ?></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    var_dump($progress);
    ?>
</div>