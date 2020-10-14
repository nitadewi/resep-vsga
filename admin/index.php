<?php

include 'temp/header.php';
include '../core/Database.php';

$db = new Database();
session_start();

?>
<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama']; ?> </span>
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                    </a>
                </div>
            </li>
        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!----taruh disini-->
        <div class="card shadow mb-4">
            <div class="d-sm-flex align-items-center justify-content-between card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-left">Daftar Artikel</h6>
                <button type="button" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Tambah Artikel</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($db->show() as $data) { ?>
                                <tr>
                                    <td width="2%"><?= $no++; ?></td>
                                    <td><?= $data['judul']; ?></td>
                                    <td><?= $data['isi']; ?></td>
                                    <td><?= $data['foto']; ?></td>
                                    <td width="20%">
                                        <center>
                                            <button type="button" class="btn-sm d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLongtime<?= $data['id'] ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="../core/proses.php?id=<?= $data['id'] ?>&action=delete" class="btn-sm d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                                <i class="fas fa-trash"></i> Hapus</a>
                                        </center>
                                    </td>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!--modal-->

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../core/proses.php?action=add" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="judul" class="form-control" placeholder="Nama Resep">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="isi" cols="30" rows="10" placeholder="Tulis Resep"></textarea>
                        </div>
                        <div class="form-group">
                            <!-- <div type="file" class="input-images" name="foto"></div> -->
                            <input class="input-images" type="file" name="foto">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--akhir modal-->

    <div class="modal fade" id="exampleModalLongtime<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../core/proses.php?action=update" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" placeholder="Nama Resep">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="isi" cols="30" rows="10" placeholder="Tulis Resep"><?= $data['isi'] ?></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--akhir modal-->
    <?php include 'temp/footer.php'; ?>