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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nip" id="floatingInput" autofocus
                                        required>
                                    <label for="floatingInput">NIP</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nama" id="floatingInput" autofocus
                                        required>
                                    <label for="floatingInput">Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="jurusan" id="floatingPassword"
                                        required>
                                    <label for="floatingPassword">Jurusan</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="prodi" id="floatingPassword" required>
                                    <label for="floatingPassword">Prodi</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="jk" name="jk"
                                    value="Jenis Kelamin" required>
                                    <option>Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="status"
                                    name="status" value="Status" required>
                                    <option>Status</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Hilang">Hilang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="alamat" id="floatingPassword" required>
                            <label for="floatingPassword">Alamat</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="date" class="form-control" name="tanggal_lahir" id="floatingPassword">
                            <label for="floatingPassword">Tanggal Lahir</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="tempat_lahir" id="floatingPassword">
                            <label for="floatingPassword">Tempat Lahir</label>
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

    <!-- sort -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle mb-2" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
            Sort
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Sort A to Z</a></li>
            <li><a class="dropdown-item" href="#">Sort Z to A</a></li>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Jenis Kelamin</th>
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
                                <td>Laki</td>
                                <td>Ada</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <!-- Button trigger modal edit -->
                                        <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit">
                                            <i class="fas fa-user-edit"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="ModalEdit" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="nip" id="nip" value="">
                                                        <div class="form-floating mb-2">
                                                            <input type="text" class="form-control" name="nama"
                                                                id="floatingInput" autofocus required>
                                                            <label for="floatingInput">Nama</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control"
                                                                        name="jurusan" id="floatingPassword"
                                                                        maxlength="2" required>
                                                                    <label for="floatingPassword">Jurusan</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control" name="prodi"
                                                                        id="floatingPassword" required>
                                                                    <label for="floatingPassword">Prodi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <select class="form-select mb-3"
                                                                    aria-label="Default select example" id="jk"
                                                                    name="jk" value="Jenis Kelamin" required>
                                                                    <option>Jenis Kelamin</option>
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <select class="form-select mb-3"
                                                                    aria-label="Default select example" id="status"
                                                                    name="status" value="Status" required>
                                                                    <option>Status</option>
                                                                    <option value="Ada">Ada</option>
                                                                    <option value="Hilang">Hilang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="level" value="admin">
                                                        <div class="form-floating mb-2">
                                                            <input type="text" class="form-control" name="alamat"
                                                                id="floatingPassword" required>
                                                            <label for="floatingPassword">Alamat</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input type="date" class="form-control" name="tanggal_lahir"
                                                                id="floatingPassword">
                                                            <label for="floatingPassword">Tanggal Lahir</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input type="text" class="form-control" name="tempat_lahir"
                                                                id="floatingPassword">
                                                            <label for="floatingPassword">Tempat Lahir</label>
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
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit -->

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
                                        <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalHapus">
                                            <i class="fas fa-user-slash"></i>
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