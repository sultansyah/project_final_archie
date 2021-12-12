<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Tugas Akhir</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Button trigger modal ajukan judul TA -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalAjukanTA">
        Ajukan Judul TA
    </button>

    <!-- Modal Ajukan TA -->
    <div class="modal fade" id="ModalAjukanTA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Judul TA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="judul" id="floatingInput" autofocus>
                            <label for="floatingInput">Judul</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="ket" id="floatingInput">
                            <label for="floatingInput">Keterangan atau Tambahan</label>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" name="file" class="form-label">Upload file yang diperlukan</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Ajukan TA -->

    <!-- sort -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle mb-2" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
            Filter
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Diterima</a></li>
            <li><a class="dropdown-item" href="#">Menunggu</a></li>
            <li><a class="dropdown-item" href="#">Ditolak</a></li>
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
                                <th scope="col">Judul</th>
                                <th scope="col">Dosen Pemimbing</th>
                                <th scope="col">Tanggal Diajukan</th>
                                <th scope="col">Tanggal Diterima</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Blablablabla</td>
                                <td>Mark</td>
                                <td>12-12-1212</td>
                                <td>12-12-1212</td>
                                <td>Diterima</td>
                                <td>
                                    <div class="btn-group" role="" aria-label="Basic example">
                                        <button type="button" class="btn btn-success mr-2">
                                            Detail Revisi
                                        </button>
                                        <!-- Button trigger modal perbarui -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#ModalPerbarui">
                                            Perbarui
                                        </button>

                                        <!-- Modal Perbarui -->
                                        <div class="modal fade" id="ModalPerbarui" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ajukan Judul TA
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="">
                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="ket"
                                                                    id="floatingInput">
                                                                <label for="floatingInput">Keterangan atau
                                                                    Tambahan</label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" name="file"
                                                                    class="form-label">Upload file yang
                                                                    diperlukan</label>
                                                                <input class="form-control" type="file" id="formFile">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Ajukan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Ajukan TA -->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- pagination -->
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
                    <!-- end pagination -->

                </div>
            </div>
        </div>

    </div>
    <!-- End Content Row -->

</div>