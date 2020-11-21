        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">User Status</h1>
            <div class="row">
                <div class="col-lg">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Role</th>
                                <th scope="col">Member Since</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($member as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><img src="<?= base_url('assets/img/profile/') . $row['image']; ?>" class="card-img"></td>
                                    <td><?= $row['role']; ?></td>
                                    <td><?= date('d F Y', $row['date_created']); ?></td>
                                    <td><?php
                                        $active = $row['is_active'];
                                        if ($active > 0) {
                                            echo 'Active';
                                        } else {
                                            echo 'Not Active';
                                        }
                                        ?></td>

                                    <td>
                                        <a href="" class="badge badge-success" data-toggle="modal" data-target="#editUserStatusModal<?= $row['id']; ?>">Edit</a>
                                        <a onclick="return confirm('Are you sure to delete this submenu?');" href="<?= base_url('menu/deleteSubMenu/') . $row['id']; ?>" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- Modal -->

        <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu/submenu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Active?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <?php foreach ($member as $row) : ?>
            <div class="modal fade" id="editUserStatusModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserStatusModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserStatusModalLabel">Edit User Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/userstatus'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <label class="form-check-label" for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="default.jpg" name="image" id="image">
                                        <label class="form-check-label" for="image">
                                            Reset Image to Default?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="role_id" id="role_id" class="form-control">

                                        <option value="<?= $row['role_id']; ?>"><?= $row['role']; ?></option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="default.jpg" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Active?
                                        </label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>