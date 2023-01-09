<?php

require_once ( 'ahp.php' );

$q="select * from kriteria";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$kriteria[]=array($h['id_kriteria'],$h['nama_kriteria']);
}
$q="select * from rumput";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$rumput[]=array($h['id_rumput'],$h['nama_rumput']);
}

for($i=0;$i<count($kriteria);$i++){
	$id_kriteria[]=$kriteria[$i][0];
}
$matrik_kriteria_rumput = ahp_get_matrik_kriteria_rumput($id_kriteria);
$jumlah_kolom = ahp_get_jumlah_kolom($matrik_kriteria_rumput);
$matrik_normalisasi = ahp_get_normalisasi($matrik_kriteria_rumput, $jumlah_kolom);
$eigen_kriteria_rumput = ahp_get_eigen($matrik_normalisasi);
	if(ahp_uji_konsistensi($matrik_kriteria_rumput, $eigen_kriteria_rumput)){
		$error='';
	}else{
		$error='Nilai Perbandingan Anda Kurang Konsisten, Perbaiki untuk Mendapatkan Hasil yang Maksimal';
	}

for($i=0;$i<count($rumput);$i++){
	$id_rumput[]=$rumput[$i][0];
}
for($i=0;$i<count($kriteria);$i++){
	$matrik_rumput = ahp_get_matrik_rumput($kriteria[$i][0], $id_rumput);
	$jumlah_kolom_rumput = ahp_get_jumlah_kolom($matrik_rumput);
	$matrik_normalisasi_rumput = ahp_get_normalisasi($matrik_rumput, $jumlah_kolom_rumput);
	$eigen_rumput[$i] = ahp_get_eigen($matrik_normalisasi_rumput);
}

$nilai_to_sort = array();

for($i=0;$i<count($rumput);$i++){
	$nilai=0;
	for($ii=0;$ii<count($kriteria);$ii++){
		$nilai = $nilai + ( $eigen_rumput[$ii][$i] * $eigen_kriteria_rumput[$ii]);
	}
	$nilai = round( $nilai , 3);
	$nilai_global[$i] = $nilai;
	$nilai_to_sort[] = array($nilai, $rumput[$i][0]);
}

sort($nilai_to_sort);
for($i=0;$i<count($nilai_to_sort);$i++){
	$ranking[$nilai_to_sort[$i][1]]=(count($nilai_to_sort) - $i);
}
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
?>
<h3 class="p2">Hasil Akhir Pemeringkatan Alternatif</h3>

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th colspan="50">HASIL PEMERINGKATAN</th>
		</tr>
		<tr>
			<th width="40">No</th>
			<th>rumput</th>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<th>'.$kriteria[$i][1].'</th>';
			}
			?>
			<th>Nilai</th>
			<th>Rank</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td>Vektor Eigen</td>
			<?php
			for($i=0;$i<count($kriteria);$i++){
				echo '<td>'.$eigen_kriteria_rumput[$i].'</td>';
			}
			?>
			<td></td>
			<td></td>
		</tr>
		<?php
		for($i=0;$i<count($rumput);$i++){
			echo '
				<tr>
					<td>'.($i+1).'</td>
					<td>'.$rumput[$i][1].'</td>
			';
			for($ii=0;$ii<count($kriteria);$ii++){
				echo '
						<td>'.$eigen_rumput[$ii][$i].'</td>
				';
				
			}
			echo '
					<td><strong>'.$nilai_global[$i].'</strong></td>
					<td>'.$ranking[$rumput[$i][0]].'</td>
				</tr>
			';
		}
		?>
	</tbody>
</table>