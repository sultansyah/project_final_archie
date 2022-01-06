<div class="container-fluid">
    <!-- Content Row -->
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-5 border-right align-items-center text-center">
                <form action="proses/prosesProfile.php" method="POST" enctype="multipart/form-data">
                    <label for="tombol_edit">
                        <img src="<?= $gambar ?>" class="rounded-circle mt-5" width="300px" height="330px"
                            onclick="edit_gambar();">
                        <p class="mt-1" style="font-weight: bold;"><?= $hasil_data['nama_dosen'] ?></p>
                    </label>
                    <input type="file" style="display: none;" id="tombol_edit" name="gambar">
                    <input type="hidden" name="id_user" value="<?= $hasil_data['id_user'] ?>">
                    <center><input type="submit" class="btn btn-primary" id="tombol_kirim" name="ganti_gambar"
                            value="Ubah Gambar"></center>
                </form>
                <span style="font-size: 15px;" id="text">Tekan gambar agar anda bisa mengganti gambar</span>
            </div>
            <div class="col-md-7">
                <form action="proses/prosesProfile.php" method="POST" enctype="multipart/form-data">
                    <div class="p-3 py-5">
                        <h4>Profile Settings</h4>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2 mt-1">
                                    <input type="text" class="form-control" name="nip" id="floatingInput"
                                        value="<?= $hasil_data['nip'] ?>" readonly>
                                    <label for="floatingInput">NIP</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2 mt-1">
                                    <input type="text" class="form-control" name="nama" id="floatingInput"
                                        value="<?= $hasil_data['nama_dosen'] ?>">
                                    <label for="floatingInput">Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-3 mt-1" aria-label="Default select example" id="jurusan"
                                    name="jurusan" value="<?= $hasil_data['jurusan'] ?>">
                                    <option><?= $hasil_data['jurusan'] ?>
                                    </option>
                                    <option value="TIK">TIK</option>
                                    <option value="Statistika">Statistika</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3 mt-1" aria-label="Default select example" id="prodi"
                                    name="prodi" value="<?= $hasil_data['prodi'] ?>">
                                    <option><?= $hasil_data['prodi'] ?>
                                    </option>
                                    <option value="MAchine">MAchine</option>
                                    <option value="TI">TI</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3 mt-1" aria-label="Default select example" id="jk"
                                    name="jenis_kelamin" value="<?= $hasil_data['jenis_kelamin'] ?>">
                                    <option>
                                        <?= $hasil_data['jenis_kelamin'] ?>
                                    </option>
                                    <?php if ($hasil_data['jenis_kelamin'] == 'Laki-Laki') { ?>
                                    <option value="Perempuan">Perempuan</option>
                                    <?php } else { ?>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control mt-1" name="no_hp" id="floatingInput"
                                value="<?= $hasil_data['no_hp'] ?>" ; ?>
                            <label for="floatingInput">NO HP</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="alamat" id="floatingInput"
                                value="<?= $hasil_data['alamat'] ?>" ; ?>
                            <label for="floatingInput">Alamat</label>
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" name="edit_profile" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>
        <!-- End Content Row -->
    </div>
</div>

<script type="text/javascript">
var tombol_kirim = document.getElementById("tombol_kirim");
//sembunyikan tombol. none -> sembunyikan, block -> tampilkan
tombol_kirim.style.display = "none";

function edit_gambar() {
    var text = document.getElementById("text");
    text.style.display = "none";

    if (text.style.display === "none") {
        tombol_kirim.style.display = "block";
    }
}
</script>