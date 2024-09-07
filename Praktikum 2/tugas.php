<?php
    // Nama : Maulida Aprillia Cinta Ariyatin
    // NIM  : 24060122120029

    function hitung_rata($array) {
        // TODO hitung rata-rata nilai mahasiswa
        $jum = array_sum($array);
        $rata_rata = $jum / count($array);
        return $rata_rata;
    }

    function print_mhs($array_mhs) {
        // TODO tampilkan tabel
        echo '<table border = 1 style = "border-collapse:collapse; width: 500px; text-align: center">';
            echo '<tr>';
                echo '<th style = " padding: 5px;background-color: orange; color: white;";>Nama Mahasiswa</th>';
                echo '<th style = " padding: 5px;background-color: orange; color: white;">Nilai 1</th>';
                echo '<th style = " padding: 5px;background-color: orange; color: white;">Nilai 2</th>';
                echo '<th style = " padding: 5px;background-color: orange; color: white;">Nilai 3</th>';
                echo '<th style = " padding: 5px;background-color: orange; color: white;">Rata-Rata Nilai</th>';
            echo '</tr>';

            foreach($array_mhs as $nama => $nilai){
                echo '<tr>';
                echo '<td>'.$nama.'</td>';

                foreach($nilai as $n){
                    echo '<td >'.$n.'</td>';
                }

                $rata_rata_nilai = hitung_rata($nilai);
                echo '<td >'.number_format($rata_rata_nilai,2).'</td>';
                echo '</tr>';
            }
        echo '</table>';
    }

    // Array data mahasiswa
    $array_mhs = [
        'Abdul' => [89, 90, 54],
        'Budi' => [78, 60, 64],
        'Nina' => [67, 56, 84],
    ];

    // Menampilkan data mahasiswa dalam bentuk tabel
    print_mhs($array_mhs);
?>