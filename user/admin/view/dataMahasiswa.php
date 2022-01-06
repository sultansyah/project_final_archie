<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Data Mahasiswa</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Button trigger modal tambah data admin -->
    <button type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah
        Data</button>

    <!-- modal tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses/prosesDataMahasiswa.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="level" value="mahasiswa">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nim" id="floatingInput" autofocus>
                                    <label for="floatingInput">NIM</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nama" id="floatingInput">
                                    <label for="floatingInput">Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="kelas" id="floatingPassword">
                                    <label for="floatingPassword">Kelas</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="no_hp" id="floatingPassword">
                                    <label for="floatingPassword">No HP</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="floatingPassword">
                                    <label for="floatingPassword">Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="tempat_lahir" id="floatingPassword">
                                    <label for="floatingPassword">Tempat Lahir</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="jurusan"
                                    name="jurusan">
                                    <option value="">Jurusan</option>
                                    <option value="Teknologi Informasi Dan Komputer">Teknologi Informasi Dan Komputer
                                    </option>
                                    <option value="Kimia">Kimia</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="prodi"
                                    name="prodi">
                                    <option value="">Prodi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Statistika">Statistika</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php
                                $select_dosen = mysqli_query($conn, "SELECT * FROM tb_dosen");
                                ?>
                                <select class="form-select mb-3" aria-label="Default select example"
                                    id="dosen_pembimbing" name="dosen_pembimbing">
                                    <option value="">Dosen Pemimbing</option>
                                    <?php while ($hasil_dosen = mysqli_fetch_array($select_dosen)) { ?>
                                    <option value="<?= $hasil_dosen['nip'] ?>">
                                        <?= $hasil_dosen['nama_dosen'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="jk"
                                    name="jenis_kelamin">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="alamat" id="floatingPassword">
                            <label for="floatingPassword">Alamat</label>
                        </div>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
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
    <!-- akhir modal tambah -->

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
                                    <th>Dosen Pemimbing</th>
                                    <th>No HP</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                                $no = 0;
                                while ($hasil_mahasiswa = mysqli_fetch_array($select_mahasiswa)) {
                                    $no++;
                                    $select_dosen = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE nip = '$hasil_mahasiswa[dosen_pembimbing]'");
                                    $hasil_dosen = mysqli_fetch_array($select_dosen);
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
                                    <td><?= $hasil_dosen['nama_dosen'] ?></td>
                                    <td><?= $hasil_mahasiswa['no_hp'] ?></td>
                                    <td><?= $hasil_mahasiswa['kelas'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal edit -->
                                            <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?= $hasil_mahasiswa['nim'] ?>">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="ModalEdit<?= $hasil_mahasiswa['nim'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesDataMahasiswa.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="level" value="mahasiswa">
                                                                <input type="hidden" name="nim_lama"
                                                                    value="<?= $hasil_mahasiswa['nim'] ?>">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="text" class="form-control"
                                                                                name="nim_baru" id="floatingInput"
                                                                                value="<?= $hasil_mahasiswa['nim'] ?>">
                                                                            <label for="floatingInput">NIM</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="text" class="form-control"
                                                                                name="nama" id="floatingInput"
                                                                                value="<?= $hasil_mahasiswa['nama_mahasiswa'] ?>">
                                                                            <label for="floatingInput">Nama</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="text" class="form-control"
                                                                                name="kelas" id="floatingPassword"
                                                                                value="<?= $hasil_mahasiswa['kelas'] ?>">
                                                                            <label for="floatingPassword">Kelas</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="number" class="form-control"
                                                                                name="no_hp" id="floatingPassword"
                                                                                value="<?= $hasil_mahasiswa['no_hp'] ?>">
                                                                            <label for="floatingPassword">No HP</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="date" class="form-control"
                                                                                name="tanggal_lahir"
                                                                                id="floatingPassword"
                                                                                value="<?= $hasil_mahasiswa['tgl_lahir'] ?>">
                                                                            <label for="floatingPassword">Tanggal
                                                                                Lahir</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="number" class="form-control"
                                                                                name="tempat_lahir"
                                                                                id="floatingPassword"
                                                                                value="<?= $hasil_mahasiswa['tempat_lahir'] ?>">
                                                                            <label for="floatingPassword">Tempat
                                                                                Lahir</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example"
                                                                            id="jurusan" name="jurusan">
                                                                            <option
                                                                                value="<?= $hasil_mahasiswa['jurusan'] ?>">
                                                                                <?= $hasil_mahasiswa['jurusan'] ?>
                                                                            </option>
                                                                            <option
                                                                                value="Teknologi Informasi Dan Komputer">
                                                                                Teknologi Informasi Dan Komputer
                                                                            </option>
                                                                            <option value="Kimia">Kimia</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example"
                                                                            id="prodi" name="prodi">
                                                                            <option
                                                                                value="<?= $hasil_mahasiswa['prodi'] ?>">
                                                                                <?= $hasil_mahasiswa['prodi'] ?>
                                                                            </option>
                                                                            <option value="Teknik Informatika">Teknik
                                                                                Informatika</option>
                                                                            <option value="Statistika">Statistika
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <?php
                                                                            $select_dosen = mysqli_query($conn, "SELECT * FROM tb_dosen");
                                                                            ?>
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example"
                                                                            id="dosen_pembimbing"
                                                                            name="dosen_pembimbing">
                                                                            <?php
                                                                                $select_nama_dosbing = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE nip = '$hasil_mahasiswa[dosen_pembimbing]'");
                                                                                $hasil_nama_dosbing = mysqli_fetch_array($select_nama_dosbing);
                                                                                ?>
                                                                            <option
                                                                                value="<?= $hasil_mahasiswa['dosen_pembimbing'] ?>">
                                                                                <?= $hasil_nama_dosbing['nama_dosen'] ?>
                                                                            </option>
                                                                            <?php
                                                                                while ($hasil_dosen = mysqli_fetch_array($select_dosen)) {
                                                                                    if ($hasil_dosen['nip'] == $hasil_mahasiswa['dosen_pembimbing'] or $hasil_dosen['nip'] == '1') {
                                                                                        continue;
                                                                                    } else {
                                                                                ?>
                                                                            <option value="<?= $hasil_dosen['nip'] ?>">
                                                                                <?= $hasil_dosen['nama_dosen'] ?>
                                                                            </option>
                                                                            <?php }
                                                                                } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example" id="jk"
                                                                            name="jenis_kelamin">
                                                                            <option
                                                                                value="<?= $hasil_mahasiswa['jenis_kelamin'] ?>">
                                                                                <?= $hasil_mahasiswa['jenis_kelamin'] ?>
                                                                            </option>
                                                                            <?php if ($hasil_mahasiswa['jenis_kelamin'] == 'Laki-Laki') { ?>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                            <?php } elseif ($hasil_mahasiswa['jenis_kelamin'] == 'Perempuan') { ?>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                            <?php } else { ?>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" id="floatingPassword"
                                                                        value="<?= $hasil_mahasiswa['alamat'] ?>">
                                                                    <label for="floatingPassword">Alamat</label>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <input type="file" class="form-control"
                                                                        id="inputGroupFile02" name="gambar">
                                                                    <label class="input-group-text"
                                                                        for="inputGroupFile02">Upload</label>
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
                                                        <form action="proses/prosesDataMahasiswa.php" method="POST"
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