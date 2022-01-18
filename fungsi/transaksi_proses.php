<?php
	session_start();
	include "koneksi.php";
	
	$jenis_transaksi_id = $_POST['transaksi'];
	$beban_rekening = $_POST['beban_rekening'];
	$tujuan_rekening = $_POST['tujuan_rekening'];
	$jumlah = $_POST['jumlah'];
	$terbilang = $_POST['terbilang'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$program_studi = $_POST['nama_konsentrasi'];
	$tgl = date('y-m-d');
	$tahun = $_POST['keterangan'];
	$semester = $_POST['semester'];
	
	if (!empty($jumlah))
	{
	   echo "$jumlah";
	}
	else
	{
	   die("Nim Kosong atau Belum Benar");
	}

	if (!empty($tujuan_rekening))
	{
	   echo "$tujuan_rekening";
	}
	else
	{
	   die("Tujuan Rekening Kosong atau Belum Benar");
	}
			$query = mysql_query("INSERT INTO bank_transaksi values('','$nim','$nama','$program_studi','$tahun','$jenis_transaksi_id','$beban_rekening','$tujuan_rekening','$jumlah','$terbilang','Telah Registrasi')", $conn2);
			if($query)
			{
				?>
					<script language ="javascript">
					alert("Data berhasil ditambahkan.");
					document.location.href = "../bank.php";
					</script>
				<?php
			}
			else
			{
			?>			<script language ="javascript">
						alert("Data gagal ditambahkan. !!");
						document.location.href = "../bank.php";
						</script>
			<?php
			}
	$datas = array();
	$query = mysql_query("SELECT * FROM bank_transaksi", $conn2);
	while($hasil = mysql_fetch_array($query)){
    $datas[] = $hasil;
	}
?>	
	
	<?php
		$json_f = json_encode($datas, JSON_PRETTY_PRINT);
		echo $json_f;
	
	while($hasil = mysql_fetch_object($query)){
		$datas['nomor_arsip']=$hasil['nomor_arsip'];
		$datas['nim']=$hasil['nim'];
		$datas['nama']=$hasil['nama'];
		$datas['program_studi']=$hasil['program_studi'];
		$datas['tahun']=$hasil['tahun'];
		$datas['jenis_transaksi_id']=$hasil['jenis_transaksi_id'];
		$datas['beban_rekening']=$hasil['beban_rekening'];
		$datas['tujuan_rekening']=$hasil['tujuan_rekening'];
		$datas['jumlah']=$hasil['jumlah'];
		$datas['terbilang']=$hasil['terbilang'];
		$datas['status']=$hasil['status'];
		
	}	
		$json_d = json_decode($json_f);
		print_r($json_d);
		foreach($json_d as $data){
			echo "</br>";
			echo 'Nomor Arsip : '.$data->nomor_arsip;
			echo "</br>";
			echo 'NIM : '.$data->nim;
			echo "</br>";
			echo 'Nama : '.$data->nama;
			echo "</br>";
			echo 'Program Studi : '.$data->program_studi;
			echo "</br>";
			echo 'Tahun : '.$data->tahun;
			echo "</br>";
			echo 'Jenis Transaksi : '.$data->jenis_transaksi_id;
			echo "</br>";
			echo 'Beban Rekening : '.$data->beban_rekening;
			echo "</br>";
			echo 'Tujuan Rekening : '.$data->tujuan_rekening;
			echo "</br>";
			echo 'Jumlah : '.$data->jumlah;
			echo "</br>";
			echo 'Terbilang : '.$data->terbilang;
			echo "</br>";
			echo 'Status : '.$data->status;
		}
		
	$fp = fopen('../../portal/data.json', 'w');
    fwrite($fp, $json_f);
    fclose($fp);
?>