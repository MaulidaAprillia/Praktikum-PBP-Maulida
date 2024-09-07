<?php
    // Nama : Maulida Aprillia Cinta Ariyatin
    // NIM  : 24060122120029
    
    // FOR-LOOP********************************************
    echo '<br />FOR-LOOP<br />';
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
        
    for ($i=1;$i<=10;$i++){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
    }
    echo '</table>';

    // WHILE********************************************
    echo '<br />WHILE<br />';
    // TODO WHILE
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
    $i = 1;
    while($i<=10){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
        $i++;
    }
    echo '</table>';

    // WHILE-DO********************************************
    echo '<br />DO-WHILE<br />';
    // TODO DO-WHILE
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
        $j = 1;
        do{
            echo '<tr>';
            echo '<td>'.$j.'</td>';
            $diskon = $j * 0.1;
            echo '<td>'.($diskon*100).' % </td>';
            $harga_diskon = $harga - ($harga * $diskon);
            echo '<td>'.$harga_diskon.'</td>';
            echo '</tr>';
            $j++;
        }while($j<=10);
    echo '</table>';
?>