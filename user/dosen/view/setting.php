<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Setting</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Content Row -->
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleFormControlInput1"
                            value="<?= $_SESSION['username'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleFormControlInput1"
                                value="" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Row -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#ModalGanti">
        Ganti Password
    </button>

    <!-- Modal Ganti Password-->
    <div class="modal fade" id="ModalGanti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="upassowrdlama" id="floatingInput" required>
                        <label for="floatingInput">Ulang Password Lama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="passwordbaru" id="floatingInput" required>
                        <label for="floatingInput">Password Baru</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="upasswordbaru" id="floatingInput" required>
                        <label for="floatingInput">Ulang Password Baru</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Ganti Password -->

</div>