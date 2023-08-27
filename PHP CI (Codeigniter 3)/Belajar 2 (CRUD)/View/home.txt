<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Home</title>
</head>

<body>
	<!-- "<h1> - <h6>" untu heading / header -->
	<h1>Data Mahasiswa</h1>

	<!-- menambahkan data / input 
	"<a href="#"></a>" penghubung dengan file lain / link 
	"<?php echo base_url('tambah') ?>" untuk melinkan dengn file tambah menggunakan base url 
	lalu buka dan tambahkan pada "routes.php"-->
	<a href="<?php echo base_url('tambah') ?>">Tambah Data</a>

	<!-- memberi jarak spasi enter -->
	<br>
	<br>

	<!-- "<tabel>" untuk membuat tabel
		"border="1"" untuk memperjelas garis tabel -->
	<table border="1">
		<!-- digunakan untuk membuat baris -->
		<tr>
			<!-- digunakan untuk membuat kolom -->
			<td>No</td>
			<td>Nama</td>
			<td>Jurusan</td>
			<td>Aksi</td>
		</tr>

		<?php
		foreach ($mhs as $data) {
		?>
			<tr>
				<td><?php echo $data->no ?></td>
				<td><?php echo $data->nama ?></td>
				<td><?php echo $data->jurusan ?></td>
				<td><a href="<?php echo base_url('update/' . $data->no); ?>">Edit</a> || <a href="<?php echo base_url('delete/' . $data->no); ?>">Delete</a></td>
			</tr>
		<?php
		}
		?>
	</table>

	<a href="<?php echo base_url('logout') ?>">Logout</a>

</body>

</html>