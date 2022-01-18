<?php
	session_start();
 
    include "fungsi/koneksi.php";
   
?>
<!-- Template-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Billing Statment Universitas Sumatera Utara</title>
		<link rel="stylesheet" href="css/css.css">
		<link href="css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>

	</head>
	
	<body>		

		<header>
				<div class="menu1sub"> </div>
				<div class="menu1">
				<a href="http://www.usu.ac.id" title="Home">
				<img src="img/tes.png" alt="Home" title="Home"></a>
				</div>
				<div class="menu2sub"> </div>
			
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="innertube">
					</div>
					<div class="innertube">
					<h1 class="pengumuman">Billing Statement Generator</h1>
					<h2 class="notes">Silakan masukkan NIM atau No. Peserta atau No. Tagihan</h2>
					<h4>Helpdesk: <br />
					0888 0758 1550,
					0888 0758 1551,
					0888 0758 1552,
					0888 0758 1553</h4>
					<h2 style="color: orange;" class="notes">Bagi mahasiswa yang masih termasuk dalam Program Bidik Misi tidak perlu mencetak Billing Statement</h2> 
					<div class="search">
					 <form action="index.php" method="POST" role="search">
					  <div>
						<input type='text'  name='qcari' class='form-control'>
						<button id='submit' onclick="document.getElementById('gtable').style.display='block'" value='Lihat'>Lihat</button>
					  </div>
					</form>
					</div>
					<div>
                    <div class="none" style="display: none;"></div>
					</div>
						<div class="result">
							<form method ="post" action="cetakpersonal.php">
							<table id="gtable" onclick="document.getElementById('gtable').style.display='none'">
								<th>Jenis Tagihan<td></td></th>

					<?php
					require_once('fungsi/koneksi.php');
					$query1=mysql_query("select student_mahasiswa.nim, keuangan_jenis_bayar.keterangan from student_mahasiswa, keuangan_jenis_bayar, keuangan_biaya_kuliah where keuangan_jenis_bayar.jenis_bayar_id=keuangan_biaya_kuliah.jenis_bayar_id and jenis_bayar_id=3", $conn1);

					if(isset($_POST['qcari'])){
						$qcari=$_POST['qcari'];
						$query1=mysql_query("select sm.nim, kjb.keterangan from student_mahasiswa sm, keuangan_jenis_bayar kjb where jenis_bayar_id=3
						and nim like '%$qcari%'", $conn1);
					}

					$result= $query1 or die(mysql_error());
					while($rows=mysql_fetch_object($result)){
								?>
								<tr>
									<td class="upper"><?php echo $rows -> keterangan;?></td>
									<td><input type="hidden" name="mk[]" value="<?=$qcari;?>" style="cursor:pointer;" id="mk"></input></td>
									<td><button class="upper" type="submit">[print]</button>
								</tr>
								<?php
					}?>
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
				<div class="copyleft">&copy; </div>2016 Tugas Database Client Server
			</div>
		</footer>
		<div class="modal">
<script type="text/javascript">
function cetak(id,id2)
{
    window.open('cetakpersonal.php');
}
</script>
		<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>