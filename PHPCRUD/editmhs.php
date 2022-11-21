<?php  
include "connectdb.php";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$readMhs = mysqli_query($koneksi, "SELECT * FROM tbl_mhs WHERE id_mhs = $id");
$getMhs = mysqli_fetch_array($readMhs);
$readJk = mysqli_query($koneksi,"SELECT * FROM tbl_jk ORDER BY id_jk ASC");
$readProdi = mysqli_query($koneksi,"SELECT * FROM tbl_prodi ORDER BY id_prodi ASC");

function email_validation($str) {
    return (!preg_match(
        "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str))
        ? FALSE : TRUE;
}

if ($_POST) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $foto = $_POST['foto'];
    $email = $_POST['email'];
    
    if(!email_validation($email)) {
        echo "<script>alert('Email Salah');location.href='editmhs.php';</script>";
    } else {
        $update = mysqli_query($koneksi,"UPDATE tbl_mhs SET
										nim='$nim', nama_mhs='$nama', jk='$jk', alamat='$alamat', prodi='$prodi', 
										foto='$foto', email='$email' WHERE id_mhs = $id");
	    if ($update) {
		    echo "<script>location.href='index.php';</script>";
	    }else {
		    echo "Gagal";
	    }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Rubah Data Mahasiswa</h4>
		</div>
		<div class="col-md-6"></div>
	</div>
	<br><br>
	<form method="POST" action="">
        <div class="form-group row">
	    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
	        <div class="col-sm-10">
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $getMhs['nim'] ?>">
	        </div>
	    </div>
        <div class="form-group row">
	    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
	        <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $getMhs['nama_mhs'] ?>">
	        </div>
	    </div>
	    <div class="form-group row">
	    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
	        <div class="col-sm-10">
                <select class="form-control" id="jk" name="jk">
				    <?php
				    while ($row = mysqli_fetch_assoc($readJk)){
				    extract($row);
				    echo "<option value='{$id_jk}'>{$nama_jk}</option>";
				    }
				    ?>
		        </select>
	        </div>
	    </div>
        <div class="form-group row">
	    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
	        <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $getMhs['alamat'] ?>">
	        </div>
	    </div>
	    <div class="form-group row">
	    <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
	        <div class="col-sm-10">
	            <select class="form-control" id="prodi" name="prodi">
				    <?php
				    while ($row2 = mysqli_fetch_assoc($readProdi)){
				    extract($row2);
				    echo "<option value='{$id_prodi}'>{$jenjang} {$nama_prodi}</option>";
				    }
				    ?>
		        </select>
	        </div>
	    </div>
        <div class="form-group row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $getMhs['foto'] ?>">
            </div>
        </div>
	    <div class="form-group row">
	    <label for="email" class="col-sm-2 col-form-label">Email</label>
	        <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $getMhs['email'] ?>">
	        </div>
	    </div>
	    <div class="form-group row">
	    <div class="col-sm-10">
	      <button type="submit" onclick="return confirm('Ubah Data?')" class="btn btn-primary">Ubah</button>
	      <button type="button" onclick="location.href='index.php'" class="btn btn-success">Kembali</button>
	    </div>
	  </div>
	</form>
</div>