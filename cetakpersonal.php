<body onload="window.print()">
<?php
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
	
$mk = $_POST['mk'];
foreach($mk as $value){	  
$q	= mysql_query("select nim from student_mahasiswa where nim='$value'", $conn1);
$q1	= mysql_query("select nama from student_mahasiswa where nim='$value'", $conn1);
$q2	= mysql_query("select nama_konsentrasi from akademik_konsentrasi, student_mahasiswa where student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id and nim='$value'", $conn1);		
$q3	= mysql_query("select nama_prodi from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN akademik_prodi ON akademik_konsentrasi.prodi_id=akademik_prodi.prodi_id where nim='$value'", $conn1);		
$q4	= mysql_query("select jenjang from student_mahasiswa, akademik_konsentrasi where student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id and nim='$value'", $conn1);
$q5	= mysql_query("select jumlah from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN keuangan_biaya_kuliah ON keuangan_biaya_kuliah.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where jenis_bayar_id=3 and nim='$value'", $conn1);
$q6	= mysql_query("select jumlah from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN keuangan_biaya_kuliah ON keuangan_biaya_kuliah.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where jenis_bayar_id=3 and nim='$value'", $conn1);
$q7	= mysql_query("select terbilang from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN keuangan_biaya_kuliah ON keuangan_biaya_kuliah.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where jenis_bayar_id=3 and nim='$value'", $conn1);}

$mk = $_POST['mk'];
foreach($mk as $value){	  
$q8		= mysql_query("select nim from student_mahasiswa where nim='$value'", $conn1);
$q9		= mysql_query("select nama from student_mahasiswa where nim='$value'", $conn1);
$q10	= mysql_query("select nama_konsentrasi from akademik_konsentrasi, student_mahasiswa where student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id and nim='$value'", $conn1);		
$q11	= mysql_query("select nama_prodi from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN akademik_prodi ON akademik_konsentrasi.prodi_id=akademik_prodi.prodi_id where nim='$value'", $conn1);		
$q12	= mysql_query("select jenjang from student_mahasiswa, akademik_konsentrasi where student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id and nim='$value'", $conn1);
$q13	= mysql_query("select jumlah from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN keuangan_biaya_kuliah ON keuangan_biaya_kuliah.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where jenis_bayar_id=3 and nim='$value'", $conn1);
$q14	= mysql_query("select jumlah from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN keuangan_biaya_kuliah ON keuangan_biaya_kuliah.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where jenis_bayar_id=3 and nim='$value'", $conn1);
$q15	= mysql_query("select terbilang from student_mahasiswa JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id JOIN keuangan_biaya_kuliah ON keuangan_biaya_kuliah.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where jenis_bayar_id=3 and nim='$value'", $conn1);
$q16	= mysql_query("select keterangan from akademik_tahun_akademik where status='y'", $conn1);
$q17	= mysql_query("select keterangan from akademik_tahun_akademik where status='y'", $conn1);
$q18	= mysql_query("select batas_registrasi from akademik_tahun_akademik where status='y'", $conn1);
$q19	= mysql_query("select batas_registrasi from akademik_tahun_akademik where status='y'", $conn1);}
?>  
</body><style type="text/css">
    body
    {
        font-size: 14px;
		width:85%;
    }
    th{
        padding: 5px;
        font-weight: bold;
        font-size: 12px;
    }
    td{
        font-size: 12px;
    }
	h1{
		font-size:16px;
		line-height:0.5;
	}
    h2{
        text-align: left;
        margin-bottom: 13px;
		line-height:0.5;
    }
	h3{
		font-size: 14px;
		line-height:0.5;
		text-align:center;
	}
	p{
		line-height:0.5;
	}
	img{
		float:left;
		width:100px;
		height:85px;
		margin-left:3%;
	}
    .potong
    {
        page-break-after:always;
    }
	.tengah{
		margin-right:12%;
		text-align:center;
	}
	.satu{
		border-right:1px solid #000000;
		border-left:1px solid #000000;
	}
	.dua{
		border-right:1px solid #000000;
		border-left:1px solid #000000;
	}
	.upper { text-transform: uppercase; }
	.capital { text-transform: capitalize; }
	
</style>
<div class="satu">
<hr style="color: black;">
<img src="img/logousu.png"></img>
<div class="tengah">
<h3>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h3>
<h1>UNIVERSITAS SUMATERA UTARA</h1>
<p>Jalan dr.T.Mansur No.9 Kampus USU Medan 20155</p>
<p align="center"><b>http://www.usu.ac.id</b></p>
</div>
<hr style="color: black;">
<table>
		<?php
		require('fungsi/koneksi.php');
		$query=mysql_query("select * from student_mahasiswa", $conn1);
		$result=(mysql_fetch_array($query) or die (mysql_error()));
		?>
		<h3>FORMULIR BUKTI SETORAN PEMBAYARAN AKADEMIK/UANG KULIAH</h3>
		<tr><td width="300">NIM/No.Peserta/No.Tagihan</td><td>: 
		<?php while($data= mysql_fetch_array($q)){?>
		<?php echo $data['nim']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Nama Mahasiswa</td><td class="upper">: 
		<?php while($data= mysql_fetch_array($q1)){?>
		<?php echo $data['nama']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Program Studi</td><td class="capital">: 
		<?php while($data= mysql_fetch_array($q2)){?>
		<?php echo $data['nama_konsentrasi']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Fakultas</td><td>:
		<?php while($data= mysql_fetch_array($q3)){?>
		<?php echo $data['nama_prodi']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Jenjang Program Studi</td><td>:
		<?php while($data= mysql_fetch_array($q4)){?>
		<?php echo $data['jenjang']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Semester, Tahun Akademik</td><td>:
		<?php echo $semester?>,
		<?php while($data= mysql_fetch_array($q17)){?>
		<?php echo $data['keterangan']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Rincian Pembayaran</td></tr>
		<tr><td>1.SPP</td><td>:Rp
		<?php while($data= mysql_fetch_array($q5)){?>
		<?php echo $data['jumlah']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Total Jumlah yang Harus Dibayarkan</td><td>:<b>Rp
		<?php while($data= mysql_fetch_array($q6)){?>
		<?php echo $data['jumlah']; ?>
		<?php } ?>
		</b></td></tr>
		<tr><td></td>
		<td><b>(Terbilang :
		<?php while($data= mysql_fetch_array($q7)){?>
		<?php echo $data['terbilang']; ?>
		<?php } ?> Rupiah)
		</b></td>
		</tr>
		
</table>
		<p>Pembayaran dilakukan ke Rekening Penerimaan Akademik USU melalui Bank Sumut Terdekat sampai tanggal 
		<?php while($data= mysql_fetch_array($q19)){?>
		<?php echo $data['batas_registrasi']; ?>
		<?php } ?></p>
<hr style="color: black;">
</div>
<hr style="border-top: dotted 3px;">
<div class="dua">
<hr style="color: black;">
<img src="img/logousu.png"></img>
<div class="tengah">
<h3>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h3>
<h1 >UNIVERSITAS SUMATERA UTARA</h1>
<p>Jalan dr.T.Mansur No.9 Kampus USU Medan 20155</p>
<p align="center"><b>http://www.usu.ac.id</b></p>
</div>
<hr style="color: black;">
<table>

		<h3>FORMULIR BUKTI SETORAN PEMBAYARAN AKADEMIK/UANG KULIAH</h3>
		<tr><td width="300">NIM/No.Peserta/No.Tagihan</td><td>: 
		<?php while($data= mysql_fetch_array($q8)){?>
		<?php echo $data['nim']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Nama Mahasiswa</td><td class="upper">: 
		<?php while($data= mysql_fetch_array($q9)){?>
		<?php echo $data['nama']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Program Studi</td><td class="capital">: 
		<?php while($data= mysql_fetch_array($q10)){?>
		<?php echo $data['nama_konsentrasi']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Fakultas</td><td>:
		<?php while($data= mysql_fetch_array($q11)){?>
		<?php echo $data['nama_prodi']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Jenjang Program Studi</td><td>:
		<?php while($data= mysql_fetch_array($q12)){?>
		<?php echo $data['jenjang']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Semester, Tahun Akademik</td><td>:
		<?php echo $semester?>,
		<?php while($data= mysql_fetch_array($q16)){?>
		<?php echo $data['keterangan']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Rincian Pembayaran</td></tr>
		<tr><td>1.SPP</td><td>:Rp
		<?php while($data= mysql_fetch_array($q13)){?>
		<?php echo $data['jumlah']; ?>
		<?php } ?>
		</td></tr>
		<tr><td>Total Jumlah yang Harus Dibayarkan</td><td>:<b>Rp
		<?php while($data= mysql_fetch_array($q14)){?>
		<?php echo $data['jumlah']; ?>
		<?php } ?>
		</b></td></tr>
		<tr><td></td>
		<td><b>(Terbilang :
		<?php while($data= mysql_fetch_array($q15)){?>
		<?php echo $data['terbilang']; ?>
		<?php } ?> Rupiah)
		</b></td>
		</tr>
		
</table>
		<p>Pembayaran dilakukan ke Rekening Penerimaan Akademik USU melalui Bank Sumut Terdekat sampai tanggal 
		<?php while($data= mysql_fetch_array($q18)){?>
		<?php echo $data['batas_registrasi']; ?>
		<?php } ?></p>
<hr style="color: black;">
</div>