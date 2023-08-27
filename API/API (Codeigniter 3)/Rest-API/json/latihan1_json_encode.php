<?php
//array
// $mahasiswa = [
//     "nim" => "1218022",
//     "nama" => "Rayandra Wandi Marselana",
//     "email" => "wandirayandra@gmail.com"
// ];

// //menampilkan data berupa array
// // var_dump($mahasiswa);

// //memasukan data array ke json
// $data = json_encode($mahasiswa);
// echo $data; //hasil array ke json

//===========================================================================================================================================

//mengambil data dari database
//connect ke database
$dbh = new PDO('mysql:host=localhost;dbname=rekomendasi_dospem', 'root', ''); //PDO bertujuan untuk membuat satu buah interface yang seragam untuk koneksi ke beragam jenis database.
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC); //PDOStatement :: fetchAll () mengembalikan set hasil yang berisi sebuah array dari semua lini yang tersisa. 

//memasukan data array ke json
$data = json_encode($mahasiswa);
echo $data; //hasil array ke json