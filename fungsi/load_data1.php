<?php
		require "koneksi.php";
			
		$sql=mysql_query("select student_mahasiswa.nim, akademik_konsentrasi.nama_konsentrasi from student_mahasiswa as ku JOIN akademik_konsentrasi as n ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN akademik_prodi ON akademik_konsentrasi.prodi_id=akademik_prodi.prodi_id where nim='$_POST[parent_id]'", $conn2;
		$response = array(); // siapkan respon yang nanti akan di convert menjadi JSON
		$query = $sql;		
		if($query){
			if(mysql_num_rows($query) == 0){
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
