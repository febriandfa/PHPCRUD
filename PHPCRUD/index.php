<?php
include "connectdb.php";

$query = mysqli_query($koneksi,"SELECT *, m.jk, m.prodi, j.id_jk, j.nama_jk, p.id_prodi, p.nama_prodi 
								FROM tbl_mhs m JOIN tbl_jk j JOIN tbl_prodi p ON m.jk=j.id_jk AND m.prodi=p.id_prodi
								ORDER BY m.id_mhs DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
</head>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Mahasiswa</h4>
		</div>
		<div class="col-md-10">
			<button onclick="location.href='tambahmhs.php'" class="btn btn-primary">Tambah Data</button>
		</div>
	</div>
	<br>
	<table id="tabeldata" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
                <th>Program Studi</th>
                <th>Foto</th>
                <th>Email</th>
                <th>Aksi</th>
			</tr>	
		</thead>
<tbody>
<?php
$no=1;
while ($row = mysqli_fetch_array($query)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama_mhs'] ?></td>
                <td><?php echo $row['nama_jk'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['nama_prodi'] ?></td>
                <td><img src="image/<?php echo $row['foto']; ?>" width="50"></td>
                <td><?php echo $row['email'] ?></td>
                <td class="text-center">
					<a href="editmhs.php?id=<?php echo $row['id_mhs'] ?>" class="btn btn-warning text-white">Edit</i></a>
					<a href="hapusmhs.php?id=<?php echo $row['id_mhs'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger">Hapus</a>
			    </td>
            </tr>
<?php
}
?>
</tbody>
		<tfoot>
			<tr>
                <th>No</th>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
                <th>Program Studi</th>
                <th>Foto</th>
                <th>Email</th>
                <th>Aksi</th>
			</tr>	
		</tfoot>
	</table>
</div>