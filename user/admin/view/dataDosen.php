<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Data Dosen</h1>
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
                <form action="proses/prosesDataDosen.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="level" value="dosen">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nip" id="floatingInput" autofocus>
                                    <label for="floatingInput">NIP</label>
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
                                <select class="form-select mb-3" aria-label="Default select example" id="jurusan"
                                    name="jurusan" value="">
                                    <option>Jurusan</option>
                                    <option value="Teknologi Informasi Dan Komputer">Teknologi Informasi Dan Komputer
                                    </option>
                                    <option value="Kimia">Kimia</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="prodi"
                                    name="prodi" value="">
                                    <option>Prodi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Statistika">Statistika</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="jk"
                                    name="jenis_kelamin" value="Jenis Kelamin">
                                    <option>Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control" name="no_hp" id="floatingPassword">
                                    <label for="floatingPassword">No HP</label>
                                </div>
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
                                    <th>Jurusan</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_dosen = mysqli_query($conn, "SELECT * FROM tb_dosen");
                                while ($hasil_dosen = mysqli_fetch_array($select_dosen)) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $hasil_dosen['id_dosen'] ?></th>
                                    <td>
                                        <img src="<?= "../images/admin/" . $hasil_dosen['gambar_dosen']; ?>" width="100"
                                            height="100" class="card-img-top" alt="...">
                                    </td>
                                    <td><?= $hasil_dosen['nama_dosen'] ?></td>
                                    <td><?= $hasil_dosen['jurusan'] ?></td>
                                    <td><?= $hasil_dosen['prodi'] ?></td>
                                    <td><?= $hasil_dosen['jenis_kelamin'] ?></td>
                                    <td><?= $hasil_dosen['no_hp'] ?></td>
                                    <td><?= $hasil_dosen['alamat'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal edit -->
                                            <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?= $hasil_dosen['id_dosen'] ?>">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="ModalEdit<?= $hasil_dosen['id_dosen'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesDataDosen.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_dosen"
                                                                    value="<?= $hasil_admon['id_dosen'] ?>">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="text" class="form-control"
                                                                                name="nip" id="floatingInput"
                                                                                value="<?= $hasil_dosen['nip'] ?>">
                                                                            <label for="floatingInput">NIP</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="text" class="form-control"
                                                                                name="nama" id="floatingInput"
                                                                                value="<?= $hasil_dosen['nama_dosen'] ?>">
                                                                            <label for="floatingInput">Nama</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select class="form-select mb-3" aria-la
                                                                            bel="Default select example" id="jurusan"
                                                                            name="jurusan"
                                                                            value="<?= $hasil_dosen['jurusan'] ?>">
                                                                            <option>
                                                                                value="<?= $hasil_dosen['jurusan'] ?>"
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
                                                                            id="prodi" name="prodi"
                                                                            value="<?= $hasil_admon['prodi'] ?>">
                                                                            <option>value="<?= $hasil_admon['prodi'] ?>"
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
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example" id="jk"
                                                                            name="jenis_kelamin"
                                                                            value="<?= $hasil_admon['jenis_kelamin'] ?>"">
                                                                            <option value="
                                                                            <?= $hasil_admon['jenis_kelamin'] ?>"><?= $hasil_admon['jenis_kelamin'] ?>
                                                                            </option>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="number" class="form-control"
                                                                                name="no_hp" id="floatingPassword">
                                                                            <label for="floatingPassword">No HP</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" id="floatingPassword">
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
                                                                <input type="submit" class="btn btn-primary"
                                                                    name="tambah" value="Tambah">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Edit -->

                                            <!-- Button trigger modal hapus -->
                                            <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalHapus<?= $hasil_dosen['id_dosen'] ?>">
                                                <i class="fas fa-user-slash"></i>
                                            </button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="ModalHapus<?= $hasil_dosen['id_dosen'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="proses/prosesDataAdmin.php" method="post"
                                                            enctype="multipart/form">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_dosen"
                                                                    value="<?= $hasil_dosen['id_dosen'] ?>">
                                                                <input type="hidden" name="id_user"
                                                                    value="<?= $hasil_dosen['id_user'] ?>">
                                                                Tekan Hapus untuk menghapus data
                                                                <span
                                                                    style="color:red"><?= $hasil_dosen['nama_dosen'] ?></span>
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