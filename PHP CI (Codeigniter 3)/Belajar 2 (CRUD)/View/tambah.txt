<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h3>Tambah siswa</h3>

    <form action="<?php echo base_url() ?>proses" method="POST">
        <table>
            <tr>
                <td>No</td>
                <td>:</td>
                <td><input type="text" name="no" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <!-- "<input type="text">" untuk membuat inputan
            "type="text"" type dari text input
            "name="nama"" inisial pada text input
            "required" text input harus diisi tidak bisa kosong
            "readonly" hanya dapat melihat tidak bisa di isi -->
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><input type="text" name="jurusan" required></td>
            </tr>
            <tr>
                <!-- untuk membuat tombol button -->
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>

</html>