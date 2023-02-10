<?php

// Struktur kendali / control flow adalah bagaimana alur dari program ketika dibaca oleh interpreter PHP. Normalnya akan dibaca dari atas ke bawah dan dari kiri ke kanan.

// 1. Pengulangan (Loop)
// - for
// for(inisialisasi; kondisi terminasi; increment atau decrement){
//     aksi;
// }


// inisialisasi: menentukan variabel awal untuk pengulangan
// kondisi terminasi: untuk memberhentikan pengulangan
// increment / decrement: agar pengulangan dapat maju atau mundur

// Contoh:
// for($i = 0; $i < 5; $i++){
//     echo "Halo";
//     echo "<br>";
// }


// - while
// definisikan kondisi awal;
// while(kondisi){
//     aksi;
//     increment atau decrement;
// }

// Contoh:
// $i = 0;
// while($i < 5){
//     echo "Halo Alif";
//     echo "<br>";
//     $i++;
// }


// - do ... While
// do{
//     aksi;
//     increment atau decrement;
// } while(kondisi)

// Contoh:
$i = 0;
do{
    echo "Halo Danar";
    echo "<br>";
    $i++;
} while($i < 5)



// - foreach (untuk array)


// 2. Pengondisian
// - if
// - if ... else ...
// - if ... else if ... else
// - ternary
// - switch

?>