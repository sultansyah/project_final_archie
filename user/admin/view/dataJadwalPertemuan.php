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

    <!-- Modal Ajukan PErtemuan -->
    <div class="modal fade" id="ModalTambahPertemuan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="keterangan" id="floatingInput" autofocus
                                required>
                            <label for="floatingInput">Keterangan</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" id="kategori"
                            name="kategori" required>
                            <option>Kategori</option>
                            <option value="admin">Bimbingan</option>
                            <option value="dosen">Konsultasi</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="tanggal_pertemuan" id="floatingInput">
                                    <label for="floatingInput">Tanggal Pertemuan</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" name="jam_pertemuan" id="floatingInput">
                                    <label for="floatingInput">Jam Pertemuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Tambah Pertemuan -->

    <!-- sort -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle mb-2" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Bimbingan</a></li>
            <li><a class="dropdown-item" href="#">Konsultasi</a></li>
            <li><a class="dropdown-item" href="#">Lainnya</a></li>
        </ul>
    </div>
    <!-- end sort -->

    <!-- search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto
                            ml-md-3 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light
                                    border-0 small" placeholder="Search" aria-label="Search"
                aria-describedby="basic-addon2 mb-3">
            <div class="input-group-append">
                <button class="btn btn-primary mb-3" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- end search -->

    <!-- Content Row -->
    <div class="row">
        <!-- card krs-->
        <div class="col">
            <div class="shadow">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Dosen Pembimbing</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col">Tanggal Pertemuan</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>TIK</td>
                                <td>TI</td>
                                <td>10-02-2321</td>
                                <td>11-03-2315</td>
                                <td>10 AM</td>
                                <td>Ada</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <!-- Button trigger modal edit pertemuan-->
                                        <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalEditPertemuan">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Modal Edit Pertemuan -->
                                        <div class="modal fade" id="ModalEditPertemuan" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pertemuan
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="">
                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="keterangan" id="floatingInput" autofocus
                                                                    required>
                                                                <label for="floatingInput">Keterangan</label>
                                                            </div>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" id="kategori"
                                                                name="kategori" required>
                                                                <option>Kategori</option>
                                                                <option value="admin">Bimbingan</option>
                                                                <option value="dosen">Konsultasi</option>
                                                                <option value="lainnya">Lainnya</option>
                                                            </select>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="date" class="form-control"
                                                                            name="tanggal_pertemuan" id="floatingInput">
                                                                        <label for="floatingInput">Tanggal
                                                                            Pertemuan</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="time" class="form-control"
                                                                            name="jam_pertemuan" id="floatingInput">
                                                                        <label for="floatingInput">Jam Pertemuan</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit Pertemuan -->

                                        <!-- Button trigger modal detail -->
                                        <button type="button" class="btn btn-success mr-2" data-bs-toggle="modal"
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
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
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

                                        <!-- Button trigger modal hapus -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#ModalHapus">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="ModalHapus" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tekan Hapus untuk menghapus data ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Hapus -->

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content Row -->

</div>