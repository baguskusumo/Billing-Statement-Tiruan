<?php 
	require "koneksi.php";
	
	$datas = array();
	$query = mysql_query("select * from bank_transaksi", $conn2);
	while($hasil = mysql_fetch_array($query)){
		$datas[] = $hasil;
		}
	
?>
	<?php
		$json_f = json_encode($datas);
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
			echo "<hr>";
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
			echo "<hr>";
		}
	?>