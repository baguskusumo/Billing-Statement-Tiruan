<?php
	session_start();
 
    require_once('fungsi/koneksi.php');

	/* Start = menentukan semester ganjil/genap */
	$nama_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$bulan = date('n') - 1;
	$bulan_ini = $nama_bulan[$bulan];
	$data_arr = array(0 => array("semester_nama" => 0, "month" => "Agustus September Oktober November Desember"),
	1 => array("semester_nama" => 1, "month" => "Januari Februari Maret April Mei Juni Juli")
	);
	for ($i=0; $i<count($data_arr); $i++) {
	if ($bulan_ini == $data_arr[$i]['month']){
	$bulan_ini = 'Ganjil';
	}
	else {
	$bulan_ini = 'Genap';
	}
	}
	$semester = $bulan_ini;
	/* End = menentukan semester ganjil/genap */
	
	$tgl=date('l, d-m-y');
	
?>
<!-- Template-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Transaksi Pembayaran USU</title>
		<link rel="stylesheet" href="css/css.css">
		<link href="css/boots.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script language="javascript" src="js/jquery.js"></script>
		<script language="javascript">
		  $(document).ready(function() {
			$("#nim").keyup(function() {
				var nim = $('#nim').val();		
				$.post('fungsi/load_data2.php', // request ke file load_data.php
				{parent_id: nim},
				function(data){
					 $('#nama').val(data[0].nama);
					 $('#nama_konsentrasi').val(data[0].nama_konsentrasi);	
					 $('#jumlah').val(data[0].jumlah);						 
				},'json'
			  );
		   });
		   });
		</script>
	</head>
	
	<body>		

		<header>
				<div class="menu2sub"> </div>
				<div align="center">BANK SUMATERA UTARA(SUMUT)</div>
				<div class="menu2sub"> </div>
			
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="innertube">
					</div>
					<div class="innertube">
					<div class="tablebank">
					<form method="post" action="fungsi/transaksi_proses.php">
					<table class="table table-bordered">
					<tr>
						<th>NIM</th>
						<td><input type="search" class="col-sm-2" id="nim" name="nim"></td>
						<th>NAMA MAHASISWA</th>
						<td><input type="text" class="col-sm-2" id="nama" name="nama"></td>
					</tr>
					<tr>
						<th>Program Studi</th>
						<td><input type="search" class="col-sm-2" id="nama_konsentrasi" name="nama_konsentrasi"></td>
						<th>Tahun Ajaran</th>
						<td><input type="text" class="col-sm-2" id="keterangan" name="keterangan"></td>
						<th>Semester</th>
						<td><input type="search" class="col-sm-2" id="semester" name="semester" value="<?php echo $semester ?>"></td>
					</tr>
					<tr>
						<th>Jenis Pembayaran</th>
					</tr>
					<tr>
						<th>SPP</th>
						<td></td>
						<th>Jumlah</th>
						<td><input type="text" class="col-sm-2" id="jumlah" name="jumlah"></td>
						<th>Terbilang</th>
						<td><input type="text" class="col-sm-3" id="terbilang" name="terbilang"></td>
					</tr>
					<tr>
						<th>Transaksi</th>
						<?php 
						$query = mysql_query("SELECT * FROM jenis_transaksi", $conn2);
						?>
							<td><select name="transaksi" id="transaksi">
						<?php
								while($fetch = mysql_fetch_array($query)){
						?>
								<option value="<?php echo $fetch['jenis_transaksi_id'];?>"><?php echo $fetch['jenis_nama_transaksi']; ?></option>
						<?php
							}
						?>
						<th>Beban Rekening</th>
						<td><input type="search" class="col-sm-2" id="beban_rekening" name="beban_rekening"></td>
					</tr>
					<tr>
						<th>Rekening Tujuan</th>
					</tr>
					<tr>
						<td><input type="search" class="col-sm-2" id="nama_universitas" name="nama_universitas"></td>
						<td></td>
						<th>No. Rek</th>
						<td><input type="search" class="col-sm-2" id="tujuan_rekening" name="tujuan_rekening" readonly="readonly"></td>
					</tr>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="text" class="col-sm-2" value="<?php echo $tgl ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Register"></td>
						<td><input type="reset" value="Reset" class="col-sm-2"></td>
						<td><input type="submit" value="Print Kuitansi" class="col-sm-2"></td>
					</tr>
					</table>
					</form>
					</div>
					</div>
					</div>
			</main>
			
			<nav>
				<div class="style">
					
					
				</div>
			</nav>
		
		</div>
		
		<footer>
			<div class="footer">
				<div class="copyleft">&copy; </div>Bank Server
			</div>
		</footer>
		<div class="modal">
		</div>
	</body>
</html>