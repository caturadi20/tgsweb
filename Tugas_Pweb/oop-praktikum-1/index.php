<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
</head>
<body style="color: white; background-color: #1d2630">
<?php

require_once "app/Mhsw.php";
$mhsw = new mhsw();
$rows = $mhsw->tampil();
if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nim'])) $vnim =$_GET['nim'];
else $vnim ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';

if($vsimpan=='simpan' && ($vnim <>''||$vnama <>''||$valamat <>'')){
    $mhsw->simpan();
    $rows = $mhsw->tampil();
    $vid ='';
    $vnim ='';
    $vnama ='';
    $valamat ='';
}

if($vaksi=="hapus")  {
    $mhsw->hapus();
    $rows = $mhsw->tampil();
}

 if($vaksi=="lihat_update")  {
    $urows = $mhsw->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['mhsw_id'];
        $vnim = $row['mhsw_nim'];
        $vnama = $row['mhsw_nama'];
        $valamat = $row['mhsw_alamat'];
    }
 }

if ($vupdate=="update"){
    $mhsw->update($vid,$vnim,$vnama,$valamat);
    $rows = $mhsw->tampil();
    $vid ='';
    $vnim ='';
    $vnama ='';
    $valamat ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vnim ='';
    $vnama ='';
    $valamat ='';
}
?>



<div class=""container mt-5>
    <div class="text-center">
        <h1 class="display-5 mb-5"><strong>CRUD APLIKASI</strong></h1>    
    </div>
    <div class="main row justify-content-center">
        <form action="" id="student-form" class="row justify-content-center mb-4" autocomplete=""></form>
    </div>
    
</div>

<form action="index.php" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>




<form action="?" method="get">
<table>
	<tr><td>NIM</td><td>:</td><td><input type="hidden" name="mhsw_id" value="<?php echo $vid; ?>" /><input type="text" name="mhsw_nim" value="<?php echo $vnim; ?>" /></td></tr>
    
    <tr><td>NAMA</td><td>:</td><td><input type="text" name="mhsw_nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>ALAMAT</td><td>:</td><td><input type="text" name="mhsw_alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td></td><td></td><td><input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/><input type="submit" name='reset' value="reset"/></td></tr>
</table>
</form>

<table border = "1">
	<tr>
		<td>NO</td>
		<td>NIM</td>
		<td>NAMA</td>
		<td>ALAMAT</td>
		<td>AKSI</td>

	</tr>

	<?php foreach ($rows as $row) { ?>

		<tr>
			<td><?php echo $row['mhsw_id']; ?></td>
			<td><?php echo $row['mhsw_nim']; ?></td>
			<td><?php echo $row['mhsw_nama']; ?></td>
			<td><?php echo $row['mhsw_alamat']; ?></td>
			<td><a href="?mhsw_id=<?php echo $row['mhsw_id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?mhsw_id=<?php echo $row['mhsw_id']; ?>&aksi=lihat_update">Update</a></td>
			
		</tr>

			<?php } ?>
		</table>

</body>
</html>