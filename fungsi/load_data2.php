<?php
		require "koneksi.php";
		
		$sql=mysql_query("select ku.nim, ku.nama, n.nama_konsentrasi from student_mahasiswa as ku JOIN akademik_konsentrasi as n ON ku.konsentrasi_id=n.konsentrasi_id where nim='$_POST[parent_id]'", $conn1);
		$sql=mysql_query("select ku.nim, k.jumlah from student_mahasiswa as ku JOIN keuangan_biaya_kuliah as k ON ku.konsentrasi_id=k.konsentrasi_id where nim'$_POST[parent_id]'", $conn1)
		$response = array(); // siapkan respon yang nanti akan di convert menjadi JSON
		$query = $sql;		
		if($query){
			if(mysql_num_rows($query) > 0){
				while($row = mysql_fetch_object($query)){
					// masukan setiap baris data ke variable respon
					$response[] = $row; 
				}
			}else{
				$response['error'] = 'Data kosong'; // memberi respon ketika data kosong
			}
		}else{
			$response['error'] = mysql_error(); // memberi respon ketika query salah
		}
		die(json_encode($response)); // convert variable respon menjadi JSON, lalu tampilkan 
	
?>
