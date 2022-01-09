<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Dashboard</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Content Row -->
    <div class="row">

        <!-- card krs-->
        <div class="col col-md-6 mb-4">
            <div class="card border-left-primary shadow
                                    h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters
                                            align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs
                                                    font-weight-bold text-info
                                                    text-uppercase mb-1 ms-2">KRS
                            </div>
                            <div class="row no-gutters
                                                    align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3
                                                            font-weight-bold
                                                            text-gray-800 ms-3">12/2000</div>
                                </div>
                                <div class="col">
                                    <div class="progress
                                                            progress-sm mr-2">
                                        <div class="progress-bar
                                                                bg-info" role="progressbar" style="width:
                                                                50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card krs-->

        <!-- card buku akademik -->
        <div class="col col-md-6 mb-4">
            <div class="card border-left-info shadow h-100
                                    py-2">
                <div class="card-body">
                    <div class="row no-gutters
                                            align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs
                                                    font-weight-bold text-info
                                                    text-uppercase mb-1 ms-2">Buku Akademik
                            </div>
                            <div class="row no-gutters
                                                    align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3
                                                            font-weight-bold
                                                            text-gray-800 ms-3">12/2000</div>
                                </div>
                                <div class="col">
                                    <div class="progress
                                                            progress-sm mr-2">
                                        <div class="progress-bar
                                                                bg-info" role="progressbar" style="width:
                                                                50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card buku akademik -->
    </div>

    <div class="row">
        <!-- card tugas akhir -->
        <div class="col col-md-6 mb-4">
            <div class="card border-left-info shadow h-100
                                    py-2">
                <div class="card-body">
                    <div class="row no-gutters
                                            align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs
                                                    font-weight-bold text-info
                                                    text-uppercase mb-1 ms-2">Tugas Akhir
                            </div>
                            <div class="row no-gutters
                                                    align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3
                                                            font-weight-bold
                                                            text-gray-800 ms-3">12/2000</div>
                                </div>
                                <div class="col">
                                    <div class="progress
                                                            progress-sm mr-2">
                                        <div class="progress-bar
                                                                bg-info" role="progressbar" style="width:
                                                                50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card tugas akhir -->

        <!-- card pertemuan -->
        <div class="col col-md-6 mb-4">
            <div class="card border-left-info shadow h-100
                                    py-2">
                <div class="card-body">
                    <div class="row no-gutters
                                            align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs
                                                    font-weight-bold text-info
                                                    text-uppercase mb-1 ms-2">Pertemuan
                            </div>
                            <div class="row no-gutters
                                                    align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3
                                                            font-weight-bold
                                                            text-gray-800 ms-3">12/2000</div>
                                </div>
                                <div class="col">
                                    <div class="progress
                                                            progress-sm mr-2">
                                        <div class="progress-bar
                                                                bg-info" role="progressbar" style="width:
                                                                50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card pertemuan -->
    </div>

    <div class="row">
        <!-- card krs-->
        <div class="col-5">
            <div class="shadow">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Dosen Pembimbing</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $select_dosbing = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE nip = '$hasil_data[dosen_pembimbing]'");
                                $hasil_dosbing = mysqli_fetch_array($select_dosbing);
                                ?>
                                <td><?= $hasil_dosbing['nama_dosen'] ?></td>
                                <td><?= $hasil_dosbing['jurusan'] ?></td>
                                <td><?= $hasil_dosbing['prodi'] ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                        data-bs-target="#ModalDetail<?= $hasil_dosbing['nip'] ?>">
                                        <i class="fas fa-info"></i>
                                    </button>

                                    <!-- Modal Minta Detail-->
                                    <div class="modal fade" id="ModalDetail<?= $hasil_dosbing['nip'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Profile Dosen
                                                        Pembimbing</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="disabled">
                                                        <div class="container bg-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-md-5 border-right align-items-center text-center">
                                                                    <img src="<?= "../images/dosen/" . $hasil_dosbing['gambar_dosen'] ?>"
                                                                        class="rounded-circle mt-5" width="300px"
                                                                        height="330px" onclick="edit_gambar();">
                                                                    <p class="mt-1" style="font-weight: bold;">
                                                                        <?= $hasil_dosbing['nama_dosen'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="p-3 py-5">
                                                                        <h4>Profile Settings</h4>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-floating mb-2 mt-1">
                                                                                    <input type="text"
                                                                                        class="form-control" name="nip"
                                                                                        id="floatingInput"
                                                                                        value="<?= $hasil_dosbing['nip'] ?>">
                                                                                    <label
                                                                                        for="floatingInput">NIP</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-floating mb-2 mt-1">
                                                                                    <input type="text"
                                                                                        class="form-control" name="nama"
                                                                                        id="floatingInput"
                                                                                        value="<?= $hasil_dosbing['nama_dosen'] ?>">
                                                                                    <label
                                                                                        for="floatingInput">Nama</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-floating mb-2 mt-1">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="jurusan"
                                                                                        id="floatingInput"
                                                                                        value="<?= $hasil_dosbing['jurusan'] ?>">
                                                                                    <label
                                                                                        for="floatingInput">Jurusan</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-floating mb-2 mt-1">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="prodi" id="floatingInput"
                                                                                        value="<?= $hasil_dosbing['prodi'] ?>">
                                                                                    <label
                                                                                        for="floatingInput">Prodi</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-floating mb-2 mt-1">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="jenis_kelamin"
                                                                                        id="floatingInput"
                                                                                        value="<?= $hasil_dosbing['jenis_kelamin'] ?>">
                                                                                    <label for="floatingInput">Jenis
                                                                                        kelamin</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Detail -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Row -->

</div>