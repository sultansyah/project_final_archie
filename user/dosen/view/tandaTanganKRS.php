<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Tanda Tangan KRS</h1>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">HP</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_krs WHERE dosen_pembimbing = '$hasil_data[nip]'");
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
                                    <td><?= $hasil_mahasiswa['prodi'] ?></td>
                                    <td><?= $hasil_mahasiswa['kelas'] ?></td>
                                    <td><?= $hasil_mahasiswa['no_hp'] ?></td>
                                    <td>
                                    <td>
                                        <?php
                                            if ($hasil_mahasiswa['status'] == 1) {
                                                echo "<span class='badge bg-warning'>Belum ditanda tangan</span>";
                                            } elseif ($hasil_mahasiswa['status'] == 2) {
                                                echo "<span class='badge bg-primary'>Sudah ditanda tangan</span>";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php
                                            $btanda = "";
                                            if ($hasil_mahasiswa['status'] == 2) $btanda = "hidden";
                                            ?>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal detail -->
                                            <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalDetail">
                                                <i class="fas fa-info"></i>
                                            </button>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="ModalDetail" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Sebuah Modal Detail yang datanya belum ada
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Detail -->

                                            <!-- Button trigger modal Tanda Tangan -->
                                            <button <?= $btanda ?> type="button" class="btn btn-danger mr-2"
                                                data-bs-toggle="modal" data-bs-target="#ModalTTD">
                                                Tanda Tangan
                                            </button>

                                            <!-- Modal Tanda Tangan -->
                                            <div class="modal fade" id="ModalTTD" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Tekan Tanda Tangan untuk menandatangani KRS mahasiswa
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Tanda
                                                                Tangan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Tanda Tangan -->

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