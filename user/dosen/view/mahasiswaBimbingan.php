<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Mahasiswa Bimbingan</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Content Row -->
    <div class="row">
        <!-- card krs-->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Jurusan</th>
                                    <th>Prodi</th>
                                    <th>No HP</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE dosen_pembimbing = '$hasil_data[nip]'");
                                $no = 0;
                                while ($hasil_mahasiswa = mysqli_fetch_array($select_mahasiswa)) {
                                    $no++;
                                ?>
                                <tr>
                                    <th><?= $no; ?></th>
                                    <td>
                                        <img src="<?= "../images/mahasiswa/" . $hasil_mahasiswa['gambar_mahasiswa']; ?>"
                                            width="100" height="100" class="card-img-top" alt="...">
                                    </td>
                                    <td><?= $hasil_mahasiswa['nama_mahasiswa'] ?></td>
                                    <td><?= $hasil_mahasiswa['nim'] ?></td>
                                    <td><?= $hasil_mahasiswa['jurusan'] ?></td>
                                    <td><?= $hasil_mahasiswa['prodi'] ?></td>
                                    <td><?= $hasil_mahasiswa['no_hp'] ?></td>
                                    <td><?= $hasil_mahasiswa['kelas'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal detail -->
                                            <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalDetail<?= $hasil_mahasiswa['nim'] ?>"
                                                onclick="disabled()">
                                                <i class="fas fa-info"></i>
                                            </button>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="ModalDetail<?= $hasil_mahasiswa['nim'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Profile
                                                                Mahasiswa <?= $hasil_mahasiswa['nama_mahasiswa'] ?></h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="disabled">
                                                                <div class="container bg-white">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-md-5 border-right align-items-center text-center">
                                                                            <img src="<?= "../images/mahasiswa/" . $hasil_mahasiswa['gambar_mahasiswa'] ?>"
                                                                                class="rounded-circle mt-5"
                                                                                width="300px" height="330px"
                                                                                onclick="edit_gambar();">
                                                                            <p class="mt-1" style="font-weight: bold;">
                                                                                <?= $hasil_mahasiswa['nama_mahasiswa'] ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="p-3 py-5">
                                                                                <h4>Profile Settings</h4>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="nip"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['nim'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">NIM</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="nama"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['nama_mahasiswa'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">Nama</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <?php
                                                                                            $select_nama_dosbing = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE nip = '$hasil_mahasiswa[dosen_pembimbing]'");
                                                                                            $hasil_nama_dosbing = mysqli_fetch_array($select_nama_dosbing);
                                                                                            ?>
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="dosen_pembimbing"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_nama_dosbing['nama_dosen'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">Dosen
                                                                                                Pembimbing</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="kelas"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['kelas'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">Kelas</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="jurusan"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['jurusan'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">Jurusan</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="prodi"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['prodi'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">Prodi</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div
                                                                                            class="form-floating mb-2 mt-1">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="jenis_kelamin"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['jenis_kelamin'] ?>">
                                                                                            <label
                                                                                                for="floatingInput">Jenis
                                                                                                kelamin</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div class="form-floating mb-2">
                                                                                            <input type="number"
                                                                                                class="form-control mt-1"
                                                                                                name="no_hp"
                                                                                                id="floatingInput"
                                                                                                value="<?= $hasil_mahasiswa['no_hp'] ?>"
                                                                                                ; ?>
                                                                                            <label
                                                                                                for="floatingInput">NO
                                                                                                HP</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-floating mb-2">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="alamat" id="floatingInput"
                                                                                        value="<?= $hasil_mahasiswa['alamat'] ?>"
                                                                                        ; ?>
                                                                                    <label
                                                                                        for="floatingInput">Alamat</label>
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

                                            <!-- Button trigger modal hapus -->
                                            <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalHapus<?= $hasil_mahasiswa['nim'] ?>">
                                                <i class="fas fa-user-slash"></i>
                                            </button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="ModalHapus<?= $hasil_mahasiswa['nim'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesMahasiswaBimbingan.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="nim"
                                                                    value="<?= $hasil_mahasiswa['nim'] ?>">
                                                                <input type="hidden" name="id_user"
                                                                    value="<?= $hasil_mahasiswa['id_user'] ?>">
                                                                Tekan Hapus untuk menghapus data
                                                                <span
                                                                    style="color:red"><?= $hasil_mahasiswa['nama_mahasiswa'] ?></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"
                                                                    name="hapus">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Hapus -->

                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content Row -->

</div>