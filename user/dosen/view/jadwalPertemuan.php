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
                        <input type="hidden" name="level_pembuat" value="dosen">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="judul" id="floatingInput" autofocus>
                            <label for="floatingInput">Judul</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="keterangan" id="floatingInput">
                            <label for="floatingInput">Keterangan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" name="tanggal_jam" id="floatingInput">
                            <label for="floatingInput">Tanggal Dan Jam Pertemuan</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="kategori"
                                    name="kategori">
                                    <option value="Belum diatur">Pilih Kategori</option>
                                    <option value="Bimbingan">Bimbingan</option>
                                    <option value="Konsultasi">Konsultasi</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="mahasiswa"
                                    name="mahasiswa">
                                    <?php
                                    $select_mahasiswa_bimbingan = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE dosen_pembimbing = '$hasil_data[nip]'");
                                    ?>
                                    <option>Pilih Mahasiswa</option>
                                    <?php while ($hasil_mahasiswa_bimbingan = mysqli_fetch_array($select_mahasiswa_bimbingan)) { ?>
                                    <option value="<?= $hasil_mahasiswa_bimbingan['nim'] ?>">
                                        <?= $hasil_mahasiswa_bimbingan['nama_mahasiswa'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Mahasiswa</th>
                                    <th scope="col">Tanggal Pertemuan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_jwp = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tb_jadwal_pertemuan JP
                                    LEFT JOIN tb_mahasiswa MHS ON MHS.nim = JP.mahasiswa
                                    LEFT JOIN tb_user USR ON USR.id_user = JP.id_user_pembuat
                                    WHERE MHS.dosen_pembimbing = '$hasil_data[nip]' || MHS.nim = 0 || USR.id_user = '$hasil_data[id_user]'"
                                );
                                $no = 0;
                                while ($hasil_jwp = mysqli_fetch_array($select_jwp)) {
                                    $no++;
                                ?>
                                <tr>
                                    <th><?= $no; ?></th>
                                    <td><?= $hasil_jwp['kategori'] ?></td>
                                    <td><?= $hasil_jwp['judul'] ?></td>
                                    <td>
                                        <?php
                                            if (isset($hasil_jwp['mahasiswa'])) {
                                                $select_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$hasil_jwp[mahasiswa]'");
                                                $hasil_mahasiswa = mysqli_fetch_array($select_mahasiswa);
                                                echo $hasil_mahasiswa['nama_mahasiswa'];
                                            }
                                            ?>
                                    </td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($hasil_jwp['tanggal_jam'])) ?></td>
                                    <td>
                                        <?php
                                            if ($hasil_jwp['status'] == 1) {
                                                echo "<span class='badge bg-warning'>Pending</span>";
                                            } elseif ($hasil_jwp['status'] == 2) {
                                                echo "<span class='badge bg-primary'>Diterima</span>";
                                            } elseif ($hasil_jwp['status'] == 3) {
                                                echo "<span class='badge bg-danger'>Ditolak</span>";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php
                                            $blink = "";
                                            $bacc = "";
                                            $btolak = "";

                                            if ($hasil_jwp['level_pembuat'] == "mahasiswa" || $hasil_jwp['level_pembuat'] == "admin") $bedit = "hidden";
                                            else $bedit = "";

                                            if ($hasil_jwp['status'] == 1) $blink = "hidden";

                                            if ($hasil_jwp['status'] == 2) {
                                                $bacc = "hidden";
                                                $btolak = "hidden";
                                                $bedit = "hidden";
                                            }

                                            if ($hasil_jwp['status'] == 3) {
                                                $bacc = "hidden";
                                                $btolak = "hidden";
                                                $bedit = "hidden";
                                                $blink = "hidden";
                                            }
                                            ?>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal edit -->
                                            <button <?= $bedit ?> type="button" class="btn btn-secondary mr-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?= $hasil_jwp['id_jadwal'] ?>">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="ModalEdit<?= $hasil_jwp['id_jadwal'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
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
                                                                    value="dosen">
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
                                                                <div class="form-floating mb-3">
                                                                    <input type="datetime-local" class="form-control"
                                                                        name="tanggal_jam" id="floatingInput"
                                                                        value="<?= date("Y-m-d\TH:i:s", strtotime($hasil_jwp['tanggal_jam'])) ?>">
                                                                    <label for="floatingInput">Tanggal Dan Jam
                                                                        Pertemuan</label>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example"
                                                                            id="kategori" name="kategori">
                                                                            <option
                                                                                value="<?= $hasil_jwp['kategori'] ?>">
                                                                                <?= $hasil_jwp['kategori'] ?>
                                                                            </option>
                                                                            <option value="Bimbingan">Bimbingan</option>
                                                                            <option value="Konsultasi">Konsultasi
                                                                            </option>
                                                                            <option value="Lainnya">Lainnya</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example"
                                                                            id="mahasiswa" name="mahasiswa">
                                                                            <?php
                                                                                if (isset($hasil_jwp['mahasiswa'])) {
                                                                                    $select_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$hasil_jwp[mahasiswa]'");
                                                                                    $hasil_mahasiswa = mysqli_fetch_array($select_mahasiswa);
                                                                                }
                                                                                ?>
                                                                            <option
                                                                                value="<?= $hasil_jwp['mahasiswa'] ?>">
                                                                                <?= $hasil_mahasiswa['nama_mahasiswa'] ?>
                                                                            </option>
                                                                            <?php
                                                                                $select_mahasiswa_bimbingan = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE dosen_pembimbing = '$hasil_data[nip]'");
                                                                                while ($hasil_mahasiswa_bimbingan = mysqli_fetch_array($select_mahasiswa_bimbingan)) {
                                                                                    if ($hasil_mahasiswa_bimbingan['nim'] != $hasil_jwp['mahasiswa']) {
                                                                                ?>
                                                                            <option
                                                                                value="<?= $hasil_mahasiswa_bimbingan['nim'] ?>">
                                                                                <?= $hasil_mahasiswa_bimbingan['nama_mahasiswa'] ?>
                                                                            </option>
                                                                            <?php }
                                                                                } ?>
                                                                        </select>
                                                                    </div>
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

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <!-- Button trigger modal ACC -->
                                                <button <?= $bacc ?> type="button" class="btn btn-secondary mr-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalACC<?= $hasil_jwp['id_jadwal'] ?>">
                                                    ACC
                                                </button>

                                                <!-- Modal ACC -->
                                                <div class="modal fade" id="ModalACC<?= $hasil_jwp['id_jadwal'] ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses/prosesDataJadwalPertemuan.php"
                                                                method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden"
                                                                        value="<?= $hasil_jwp['id_jadwal'] ?>"
                                                                        name="id_jadwal">
                                                                    Tekan ACC untuk menerima ajuan pertemuan
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger"
                                                                        name="acc">ACC</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal ACC -->

                                                <!-- Button trigger modal tolak -->
                                                <button <?= $btolak ?> type="button" class="btn btn-danger mr-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalTolak<?= $hasil_jwp['id_jadwal'] ?>">
                                                    Tolak
                                                </button>

                                                <!-- Modal Tolak-->
                                                <div class="modal fade" id="ModalTolak<?= $hasil_jwp['id_jadwal'] ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                    Pertemuan
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses/prosesDataJadwalPertemuan.php"
                                                                method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden"
                                                                        value="<?= $hasil_jwp['id_jadwal'] ?>"
                                                                        name="id_jadwal">
                                                                    Tekan Tolak untuk menolak ajuan pertemuan
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger"
                                                                        name="tolak">Tolak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Tolak -->

                                                <!-- Button trigger modal link -->
                                                <button <?= $blink ?> type="button" class="btn btn-primary mr-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalLink<?= $hasil_jwp['id_jadwal'] ?>">
                                                    Link
                                                </button>

                                                <!-- Modal Link-->
                                                <div class="modal fade" id="ModalLink<?= $hasil_jwp['id_jadwal'] ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Pertemuan
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses/prosesDataJadwalPertemuan.php"
                                                                method="post">
                                                                <div class="modal-body">
                                                                    <input type="hidden"
                                                                        value="<?= $hasil_jwp['id_jadwal'] ?>"
                                                                        name="id_jadwal">
                                                                    <?php if ($hasil_jwp['link_meet'] != "") { ?>
                                                                    <p>Zoom sudah dibuat</p>
                                                                    <input type="hidden" name="ada/belum" value="ada">
                                                                    <?php $value = "Masuk Ke Pertemuan"; ?>
                                                                    <?php } elseif ($hasil_jwp['link_meet'] == "") { ?>
                                                                    <input type="hidden" name="ada/belum" value="belum">
                                                                    <input type="hidden" name="judul"
                                                                        value="<?= $hasil_jwp['judul'] ?>">
                                                                    <input type="hidden" name="tanggal_jam"
                                                                        value="<?= $hasil_jwp['tanggal_jam'] ?>">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="number" class="form-control"
                                                                            name="durasi" id="durasi" required min="1"
                                                                            max="60">
                                                                        <label for="durasi">Durasi Meeting Zoom 1-60
                                                                            menit</label>
                                                                    </div>
                                                                    <?php $value = "Buat Pertemuan"; ?>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger"
                                                                        name="link"><?= $value ?></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Link -->

                                            </div>

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