    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="position: fixed; width: 100%;">

                <!-- As a heading -->
                <nav class="navbar">
                    <span class="navbar-brand mb-0 h1" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 2rem; font-weight: bold;"><?= $title; ?></span>
                </nav>
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto ">

                    <li class="nav-item">
                        <a class="nav-link text-dark text-gray-600 <?php if ($title == "WORK PLAN") {
                                                                        echo "d-none";
                                                                    } ?>" href="<?= base_url('job/progress/') . $pekerjaan['id']; ?>">Work Plan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark text-gray-600 <?php if ($title == "UPDATE PROGRESS") {
                                                                        echo "d-none";
                                                                    } ?>" href="<?= base_url('job/update_progress/') . $pekerjaan['id']; ?>">Update Progress</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark text-gray-600 <?php if ($title == "CHART") {
                                                                        echo "d-none";
                                                                    } ?>" href="#">Chart</a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('user'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->