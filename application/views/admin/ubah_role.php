<div class="container">
    <?php foreach ($member as $m) : ?>
        <h2>Ubah role <?= $m['name']; ?></h2>
    <?php endforeach; ?>
    <div class="col-lg">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($role as $r) :
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $r['role']; ?></td>
                        <td><?= $m['email']; ?></td>
                        <td><?php
                            if ($m['role_id'] == 1) {
                                echo "Admin";
                            } else {
                                echo  "User";
                            } ?>
                            <?php if ($m['role_id'] != 1) { ?>
                                <br> <a href="<?= base_url('admin/gantirole_member/') . $m['id']; ?>" class="badge badge-warning">edit</a>
                            <?php } ?>
                        </td>
                        <td><?php
                            if ($m['is_active'] == 1) {
                                echo "Aktif";
                            } else {
                                echo "Tidak aktif";
                            } ?>
                            <br><a href="" class="badge badge-warning">edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>