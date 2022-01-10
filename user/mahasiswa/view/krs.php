<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Data Kartu Rencana Studi</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Button trigger modal ajukan judul TA -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahPertemuan">
        Tambah Data KRS
    </button>

    <!-- Modal Tambah Pertemuan -->
    <div class="modal fade" id="ModalTambahPertemuan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kartu Rencana Studi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses/prosesKRS.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="nim" value="<?= $hasil_data['nim'] ?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="dosen_pembimbing"
                                value="<?= $hasil_data['dosen_pembimbing'] ?>" id="floatingInput" readonly>
                            <label for="floatingInput">Dosen Pemimbing</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="semester" id="floatingInput" required>
                            <label for="floatingInput">Semester Contoh Format: 2021/2022 Ganjil</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="kelas" id="floatingInput" maxlength="2"
                                required>
                            <label for="floatingInput">Kelas</label>
                        </div>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" id="inputGroupFile02" name="berkas_krs" required>
                            <label class="input-group-text" for="inputGroupFile02">Berkas KRS</label>
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
                                    <th scope="col">Semester</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_krs = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tb_krs WHERE nim_mahasiswa = '$hasil_data[nim]'"
                                );
                                $no = 0;
                                while ($hasil_krs = mysqli_fetch_array($select_krs)) {
                                    $no++;
                                ?>
                                <tr>
                                    <th><?= $no; ?></th>
                                    <td><?= $hasil_krs['semester'] ?></td>
                                    <td><?= $hasil_krs['kelas'] ?></td>
                                    <td>
                                        <?php
                                            if ($hasil_krs['status'] == 1) {
                                                echo "<span class='badge bg-warning'>Belum ditanda tangan</span>";
                                            } elseif ($hasil_krs['status'] == 2) {
                                                echo "<span class='badge bg-primary'>Sudah ditanda tangan</span>";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php
                                            $bdetail = "";
                                            $btanda = "";
                                            $bedit = "";

                                            if ($hasil_krs['status'] == 2) {
                                                $bdetail = "";
                                                $btanda = "hidden";
                                            }

                                            ?>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <!-- Button trigger modal edit -->
                                            <button <?= $bedit ?> type="button" class="btn btn-success mr-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?= $hasil_krs['id_krs'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Modal Minta Edit-->
                                            <div class="modal fade" id="ModalEdit<?= $hasil_krs['id_krs'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesKRS.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_krs"
                                                                    value="<?= $hasil_krs['id_krs'] ?>">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        name="dosen_pembimbing"
                                                                        value="<?= $hasil_data['dosen_pembimbing'] ?>"
                                                                        id="floatingInput" readonly>
                                                                    <label for="floatingInput">Dosen Pemimbing</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        name="semester" id="floatingInput"
                                                                        value="<?= $hasil_krs['semester'] ?>">
                                                                    <label for="floatingInput">Semester Contoh Format:
                                                                        2021/2022 Ganjil</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="kelas"
                                                                        id="floatingInput" maxlength="2"
                                                                        value="<?= $hasil_krs['kelas'] ?>">
                                                                    <label for="floatingInput">Kelas</label>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <input type="file" class="form-control"
                                                                        id="inputGroupFile02" name="berkas_krs">
                                                                    <label class="input-group-text"
                                                                        for="inputGroupFile02">Berkas KRS</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="edit"
                                                                    class="btn btn-danger">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Edit -->

                                            <!-- Button trigger modal detail -->
                                            <a <?= $bdetail ?> class="btn btn-primary mr-2"
                                                href="proses/ViewPdf.php?nama_pdf=<?= $hasil_krs['berkas_krs'] ?>"
                                                target="_blank">
                                                <i class="fas fa-info"></i>
                                            </a>

                                            <!-- Modal Detail-->
                                            <!-- <div class="modal fade" id="ModalDetail"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="detail"
                                                                class="btn btn-danger">Lihat</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- Akhir Modal Detail -->

                                            <!-- Button trigger modal tanda tangan -->
                                            <button <?= $btanda ?> type="button" class="btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalMinta<?= $hasil_krs['id_krs'] ?>">
                                                Minta Tanda Tangan
                                            </button>

                                            <!-- Modal Minta Tanda Tangan-->
                                            <div class="modal fade" id="ModalMinta<?= $hasil_krs['id_krs'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Minta Tanda
                                                                Tangan
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Belum bisa
                                                            <!-- Tekan Minta untuk menyuruh dosen menandatangani -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="tanda_tangan"
                                                                class="btn btn-danger">Minta</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Minta Tanda Tangan -->
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