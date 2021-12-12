<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Revisi TA</h1>
    </div>
    <!-- End Page Heading -->

    <!-- sort -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle mb-2" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
            Filter & Sort
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Selesai</a></li>
            <li><a class="dropdown-item" href="#">Belum</a></li>
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
                                <th scope="col">Judul TA</th>
                                <th scope="col">Tanggal Direvisi</th>
                                <th scope="col">Tanggal Diperbarui</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Blabla</td>
                                <td>12-12-1212</td>
                                <td>12-12-1212</td>
                                <td>Sudah</td>
                                <td>
                                    <div class="btn-group" role="" aria-label="Basic example">
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

                                        <a href="revisi" class="btn btn-success mr-2">
                                            Revisi
                                        </a>

                                        <!-- Button trigger modal Selesai -->
                                        <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalSelesai">
                                            Selesai
                                        </button>

                                        <!-- Modal Tanda Tangan -->
                                        <div class="modal fade" id="ModalSelesai" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Selesai</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tekan Selesai agar TA mahasiswa .. selesai
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Selesai</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Selesai -->

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