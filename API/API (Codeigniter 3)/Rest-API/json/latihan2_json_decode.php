<?php
//ambil file JSON
$data = file_get_contents('coba.json'); //abil dari tempat lain tinggal masukan httpnya

//menampilkan data JSON ke array
$mahasiswa = json_decode($data, true); //jika tidak pakai "true" akan berubah menjadi object
var_dump($mahasiswa); //menampilkan JSON ke array