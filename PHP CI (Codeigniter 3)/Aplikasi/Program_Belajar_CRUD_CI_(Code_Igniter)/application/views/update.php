<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h3>Edit siswa</h3>
    <form action="<?php echo base_url() ?>prosesup" method="POST">
        <table>
            <?php
            foreach ($mhs as $data) {
            ?>

                <tr>
                    <td><input type="hidden" name="no" value="<?php echo $data->no ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <!-- "require" untuk melihat data saja-->
                    <td><input type="text" name="nama" value="<?php echo $data->nama ?>" readonly></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td><input type="text" name="jurusan" value="<?php echo $data->jurusan ?>"></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <!-- untuk membuat tombol button -->
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>

</html>