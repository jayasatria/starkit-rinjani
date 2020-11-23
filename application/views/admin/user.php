<div class="container">
    <h2>Daftar User</h2>
    <a href="<?= base_url('admin/tambah_user') ?>" class="btn btn-primary mb-2">Tambah User</a>
    <?= $this->session->flashdata('message'); ?>
    <div class="col-lg">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($member as $m) :
                ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $m['name']; ?></td>
                        <td><?= $m['email']; ?></td>
                        <td><?php
                            if ($m['role_id'] == 1) {
                                echo "Admin";
                            } elseif ($m['role_id'] == 2) {
                                echo  "User";
                            } else {
                                echo "Vendor";
                            } ?>
                            <?php if ($m['role_id'] != 1) { ?>
                                <br> <a href="" class="badge badge-warning" data-toggle="modal" data-target="#ModalRole<?= $m['id'] ?>">edit</a>
                            <?php } ?>
                        </td>
                        <td><?php
                            if ($m['is_active'] == 1) {
                                echo "Aktif";
                            } else {
                                echo "Tidak aktif";
                            } ?>
                            <?php if ($m['role_id'] != 1) { ?>
                                <br><a href="<?= base_url('admin/aktivasi/') . $m['id']; ?>" class="badge badge-success">
                                    <?php if ($m['is_active'] != 1) {
                                        echo  "activate";
                                    } else {
                                        echo "deactivate";
                                    } ?>
                                </a>

                            <?php

                            } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal Change role -->
<?php
foreach ($member as $m) :
?>
    <!-- Modal -->
    <div class="modal fade" id="ModalRole<?= $m['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Role <?= $m['name'] ?> ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/gantirole_member/') . $m['id']; ?>" method="POST">
                        <select name="role" id="role" class="custom-select">
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>