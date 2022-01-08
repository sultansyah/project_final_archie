<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Data Jadwal Pertemuan</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Button trigger modal ajukan judul TA -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahPertemuan">
        Tambah Pertemuan
    </button>

    <!-- Modal Tambah Pertemuan -->
    <div class="modal fade" id="ModalTambahPertemuan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses/prosesDataJadwalPertemuan.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_user_pembuat" value="<?= $hasil_data['id_user'] ?>">
                        <input type="hidden" name="level_pembuat" value="admin">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="judul" id="floatingInput" autofocus>
                            <label for="floatingInput">Judul</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="keterangan" id="floatingInput">
                            <label for="floatingInput">Keterangan</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" id="kategori"
                            name="kategori">
                            <option value="Belum diatur">Pilih Kategori</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" name="tanggal_jam" id="floatingInput">
                            <label for="floatingInput">Tanggal Dan Jam Pertemuan</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Tambah Pertemuan -->

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
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Dan Jadwal Pertemuan</th>
                                    <th>Nama Pembuat</th>
                                    <th>Nama Pengedit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_jwp = mysqli_query($conn, "SELECT * FROM tb_jadwal_pertemuan");
                                $no = 0;
                                while ($hasil_jwp = mysqli_fetch_array($select_jwp)) {
                                    $no++;
                                ?>
                                <tr>
                                    <th><?= $no; ?></th>
                                    <td><?= $hasil_jwp['judul'] ?></td>
                                    <td><?= $hasil_jwp['keterangan'] ?></td>
                                    <td><?= $hasil_jwp['kategori'] ?></td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($hasil_jwp['tanggal_jam'])) ?></td>
                                    <td>
                                        <?php
                                            if (isset($hasil_jwp['nama_pembuat'])) {
                                                $tabel_pembuat = 'tb_' . $hasil_jwp['level_pembuat'];
                                                $select_pembuat = mysqli_query($conn, "SELECT * FROM $tabel_pembuat WHERE id_user = '$hasil_jwp[id_user_pembuat]'");
                                                $hasil_pembuat = mysqli_fetch_array($select_pembuat);
                                                echo $hasil_pembuat['nama_' . $hasil_jwp['level_pembuat']] . ' - ' . $hasil_jwp['level_pembuat'];
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php if (isset($hasil_jwp['id_user_pengedit'])) {
                                                $tabel_pengedit = 'tb_' . $hasil_jwp['level_pengedit'];
                                                $select_pengedit = mysqli_query($conn, "SELECT * FROM $tabel_pengedit WHERE id_user = '$hasil_jwp[id_user_pengedit]'");
                                                $hasil_pengedit = mysqli_fetch_array($select_pengedit);
                                                echo $hasil_pengedit['nama_' . $hasil_jwp['level_pengedit']] . ' - ' . $hasil_jwp['level_pengedit'];
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal edit -->
                                            <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?= $hasil_jwp['id_jadwal'] ?>">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="ModalEdit<?= $hasil_jwp['id_jadwal'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesDataJadwalPertemuan.php"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_jadwal"
                                                                    value="<?= $hasil_jwp['id_jadwal'] ?>">
                                                                <input type="hidden" name="id_user_pengedit"
                                                                    value="<?= $hasil_data['id_user'] ?>">
                                                                <input type="hidden" name="level_pengedit"
                                                                    value="admin">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="judul"
                                                                        id="floatingInput"
                                                                        value="<?= $hasil_jwp['judul'] ?>" autofocus>
                                                                    <label for="floatingInput">Judul</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        name="keterangan" id="floatingInput"
                                                                        value="<?= $hasil_jwp['keterangan'] ?>">
                                                                    <label for="floatingInput">Keterangan</label>
                                                                </div>
                                                                <select class="form-select mb-3"
                                                                    aria-label="Default select example" id="kategori"
                                                                    name="kategori">
                                                                    <option value="<?= $hasil_jwp['kategori'] ?>">
                                                                        <?= $hasil_jwp['kategori'] ?>
                                                                    </option>
                                                                    <option value="Lainnya">Lainnya</option>
                                                                </select>
                                                                <div class="form-floating mb-3">
                                                                    <input type="datetime-local" class="form-control"
                                                                        name="tanggal_jam" id="floatingInput"
                                                                        value="<?= date("Y-m-d\TH:i:s", strtotime($hasil_jwp['tanggal_jam'])) ?>">
                                                                    <label for="floatingInput">Tanggal Dan Jam
                                                                        Pertemuan</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" name="edit"
                                                                    value="Edit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Edit -->

                                            <!-- Button trigger modal hapus -->
                                            <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalHapus<?= $hasil_jwp['id_jadwal'] ?>">
                                                <i class="fas fa-user-slash"></i>
                                            </button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="ModalHapus<?= $hasil_jwp['id_jadwal'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesDataJadwalPertemuan.php"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_jadwal"
                                                                    value="<?= $hasil_jwp['id_jadwal'] ?>">
                                                                Tekan Hapus untuk menghapus jadwal pertemuan
                                                                <span
                                                                    style="color:red"><?= $hasil_jwp['judul'] ?></span>
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