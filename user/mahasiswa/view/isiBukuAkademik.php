<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Buku Akademik</h1>
    </div>
    <!-- End Page Heading -->


    <!-- Content Row -->
    <div class="row">
        <div class="col-2">
            <div style="font-weight: bold;">
                <p>Semester: 3</p>
                <p>IP: 3.45</p>
                <p>IPK: 3.55</p>
            </div>
        </div>

        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                Tambah
            </button>

            <!-- Modal Tambah-->
            <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="materi" id="floatingInput" autofocus
                                    required>
                                <label for="floatingInput">Materi Konsultasi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="tanggal_pertemuan" id="floatingInput">
                                <label for="floatingInput">Tanggal Pertemuan</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah -->

            <div class="shadow">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Materi Konsultasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>3.45</td>
                                <td>3.55</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                        data-bs-target="#ModalEdit">
                                        Edit
                                    </button>

                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="ModalEdit" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="materi"
                                                            id="floatingInput" autofocus required>
                                                        <label for="floatingInput">Materi Konsultasi</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" name="tanggal_pertemuan"
                                                            id="floatingInput">
                                                        <label for="floatingInput">Tanggal Pertemuan</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Edit -->

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#ModalMinta">
                                        Minta Tanda Tangan
                                    </button>

                                    <!-- Modal Minta Tanda Tangan-->
                                    <div class="modal fade" id="ModalMinta" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Minta Tanda Tangan
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tekan Minta untuk menyuruh dosen menandatangani
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Minta</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Minta Tanda Tangan -->

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content Row -->

</div>