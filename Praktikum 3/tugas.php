// Nama : Maulida Aprillia Cinta Ariyatin
// NIM  : 240060122120029
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color:  #c4c4d6;
        }
        
    </style>
</head>
<body>
<?php
    $nis = $nama = $kelas = $jenis_kelamin = "";
    $error_nis = $error_nama = $error_kelas = $error_jenis_kelamin = $error_ekskul = "";

    if (isset($_POST['submit'])) {
        // Validasi NIS: harus terdiri atas 10 karakter angka
        $nis = test_input($_POST['nis']);
        if (empty($nis)) {
            $error_nis = "NIS harus diisi";
        } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
            $error_nis = "NIS harus terdiri dari 10 angka";
        }

        // Validasi nama: tidak boleh kosong
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        }

        // Validasi kelas: tidak boleh kosong
        $kelas = $_POST['kelas'];
        if (empty($kelas)) {
            $error_kelas = "Kelas harus dipilih";
        }

        // Validasi jenis kelamin: tidak boleh kosong
        if (!isset($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "Jenis kelamin harus dipilih";
        }

        // Validasi ekstrakurikuler untuk kelas X dan XI
        if ($kelas == "X" || $kelas == "XI") {
            if (!isset($_POST['ekstrakurikuler'])) {
                $error_ekskul = "Ekstrakurikuler harus dipilih";
            } elseif (count($_POST['ekstrakurikuler']) < 1 || count($_POST['ekstrakurikuler']) > 3) {
                $error_ekskul = "Pilih minimal 1 dan maksimal 3 kegiatan ekstrakurikuler";
            }
        }
        // Jika kelas XII, tidak ada ekstrakurikuler yang dipilih
        if ($kelas == "XII" && isset($_POST['ekstrakurikuler'])) {
            $error_ekskul = "Siswa kelas XII tidak diperbolehkan mengikuti ekstrakurikuler";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<div class="container-sm" style="width: 600px;">
    <div class="container mt-5 border rounded p-0" style="background-color: white;">
        <div class="bg-secondary rounded-top p-2 text-white text-center">Form Input Siswa</div>
        <form method="post">
            <div class="form-group m-2">
                <label for="nis">NIS:</label><br />
                <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if (isset($nis)) {echo $nis; }?>">
                <div class="error text-danger"><?php if (isset($error_nis)) echo $error_nis; ?></div>
            </div>
            <div class="form-group m-2">
                <label for="nama">Nama:</label><br />
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if (isset($nama)) {echo $nama; }?>">
                <div class="error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
            </div>
            <div class="form-group m-2">
                <label for="kelas">Kelas:</label><br />
                <select class="form-control" id="kelas" name="kelas">
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X" <?php if ($kelas == "X") {echo 'selected';}?>>X</option>
                    <option value="XI" <?php if ($kelas == "XI") {echo 'selected';}?>>XI</option>
                    <option value="XII" <?php if ($kelas == "XII") {echo 'selected';}?>>XII</option>
                </select>
                <div class="error text-danger"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
            </div>
            <label class="check m-2">Jenis Kelamin:</label><br />
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Pria" 
                    <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Pria" ) {echo 'checked'; }?>>Pria
                </label>
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Wanita" 
                    <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Wanita" ) {echo 'checked'; }?>>Wanita
                </label>
            </div>
            <div class="error text-danger" style="margin-left: 10px;"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>

            <!-- Ekstrakurikuler hanya untuk kelas X atau XI-->
            <?php if ($kelas == "X" || $kelas == "XI"): ?>
            <div id="ekskulSection">
                <label class="check m-2">Ekstrakurikuler:</label><br />
                <div class="form-check m-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Pramuka">Pramuka
                    </label>
                </div>
                <div class="form-check m-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Paskibra">Paskibra
                    </label>
                </div>
                <div class="form-check m-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="PMR">PMR
                    </label>
                </div>
                <div class="form-check m-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Basket">Basket
                    </label>
                </div>
                <div class="error text-danger"><?php if (isset($error_ekskul)) echo $error_ekskul; ?></div>
            </div>
            <?php endif; ?>
            
            <div class="m-2 text-center">
                <button type="submit" class="btn btn-primary" style="border-radius: 10px;" name="submit">Submit</button>
                <button type="reset" class="btn btn-danger" style="border-radius: 10px;">Reset</button>
            </div>
        </form> 
    </div>
    <div class="container mt-3">
    <div class="card text-bg-light mb-3" style="max-width: 600px;">
    <?php
        if (isset($_POST["submit"]) && empty($error_nis) && empty($error_nama) && empty($error_kelas) && empty($error_jenis_kelamin) && empty($error_ekskul)) {
            echo '<div class="card-header">';
            echo "<h3 style='margin-top:0px;'>Your Input:</h3> </div>";
            echo '<div class="card-body">';
            echo 'NIS = '.$_POST['nis'].'</br>';
            echo 'Nama = '.$_POST['nama'].'</br>';
            echo 'Kelas = '.$_POST['kelas'].'</br>';

            if (isset($_POST['jenis_kelamin'])) {
                echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
            } else {
                echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
            }

            // menampilkan ekstrakurikuler hanya jika kelas X atau XI
            if (isset($_POST['ekstrakurikuler']) && ($kelas == "X" || $kelas == "XI")) {
                echo 'Ekstrakurikuler yang dipilih: ';
                foreach ($_POST['ekstrakurikuler'] as $ekskul) {
                    echo '<br />- '.$ekskul;
                }
            } elseif ($kelas == "XII") {
                echo 'Siswa kelas XII tidak mengikuti ekstrakurikuler';
            }
            echo '</div>';
        }
    ?>
    </div>
    </div>
</div>
</body>
</html>
