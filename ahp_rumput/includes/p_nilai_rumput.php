<?php
$link_update='?hal=nilai_rumput';

$q="select * from rumput";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$rumput[]=array($h['id_rumput'],$h['nama_rumput']);
}

$id_kriteria=$_POST['kriteria_rumput'];

if(isset($_POST['save'])){

	$q2=mysql_query("select id_rumput2 from nilai_alternatif where id_kriteria='".$id_kriteria."'");
	$max_id=0;
	while($h2=mysql_fetch_array($q2)){
		$id_rumput2=$h2['id_rumput2'];
		if ($id_rumput2>$max_id) {
					$max_id=$id_rumput2;
				}
	}

		for($i=0;$i<count($rumput);$i++){
			for($ii=0;$ii<count($rumput);$ii++){
				if ($i<$ii) {
					if ($rumput[$i][0]>$max_id || $rumput[$ii][0]>$max_id) {
						$max_id=1000;
						mysql_query("insert into nilai_alternatif (id_kriteria, id_rumput1, id_rumput2, nilai)
							values ('".$id_kriteria."','".$rumput[$i][0]."','".$rumput[$ii][0]."','".$_POST['nilai_'.$rumput[$i][0].'_'.$rumput[$ii][0]]."')");
					} else {
					mysql_query("update nilai_alternatif set nilai='".$_POST['nilai_'.$rumput[$i][0].'_'.$rumput[$ii][0]]."' where id_kriteria='".$id_kriteria."' and id_rumput1='".$rumput[$i][0]."' and id_rumput2='".$rumput[$ii][0]."'");
					}
			}
		}
	}

	require_once ( 'ahp2.php' );
	for($i=0;$i<count($rumput);$i++){
		$id_rumput[]=$rumput[$i][0];
	}
	
	$matrik_rumput = ahp2_get_matrik_rumput($id_kriteria, $id_rumput);
	$jumlah_kolom = ahp2_get_jumlah_kolom($matrik_rumput);
	$matrik_normalisasi = ahp2_get_normalisasi($matrik_rumput, $jumlah_kolom);
	$eigen = ahp2_get_eigen($matrik_normalisasi);
	
	if(ahp2_uji_konsistensi($matrik_rumput, $eigen)){
		$success='Nilai Perbandingan : KONSISTEN';
	}else{
		$error='Nilai Perbandingan : TIDAK KONSISTEN';
	}
}

$q="select * from kriteria";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	if($h['id_kriteria']==$id_kriteria){$s='selected';}else{$s='';}
	$list_kriteria_rumput.='<option value="'.$h['id_kriteria'].'"'.$s.'>'.$h['nama_kriteria'].'</option>';
}

?>

<h3 class="p2">Penilaian Alternatif (Rumput)</h3>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
	<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
	$error='';
}
if(!empty($success)){
	echo '
	   <div class="alert alert-success ">
		  '.$success.'
	   </div>
	';
	$success='';
	echo $max_id;
}
?>
<table class="table table-striped table-hover table-bordered">
	<tbody>
		<tr>
			<td width="100">Kriteria Rumput</td>
			<td><select name="kriteria_rumput" class="medium m-wrap" onchange="submit()"><?php echo $list_kriteria_rumput;?></select></td>
		</tr>
	</tbody>
</table>
</form>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<input name="kriteria_rumput" type="hidden" value="<?php echo $id_kriteria;?>" />

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Rumput A</th>
			<th>Rumput B</th>
			<th>Nilai Perbandingan</th>
		</tr>
	</thead>
	<tbody>

<?php
for($i=0;$i<count($rumput);$i++){
	for($ii=0;$ii<count($rumput);$ii++){
		if($i < $ii){
			$q=mysql_query("select nilai from nilai_alternatif where id_kriteria='".$id_kriteria."' and id_rumput1='".$rumput[$i][0]."' and id_rumput2='".$rumput[$ii][0]."'");
				$h=mysql_fetch_array($q);
				$nilai=$h['nilai'];
?>
			  	<tr>
				<td align="right"><?php echo $rumput[$i][1]; ?></td>
				<td><?php echo $rumput[$ii][1]; ?></td>
				<td align="center">

<select style="width:500px" id="nilai" name=" <?php echo 'nilai_'.$rumput[$i][0].'_'.$rumput[$ii][0]; ?>">
    <option <?php if ($nilai == 1) {echo "selected";} ?> value="1"> <?php echo $rumput[$i][1].' sama penting dengan '.$rumput[$ii][1].' (1)'; ?> </option>
    <option <?php if ($nilai == 2) {echo "selected";} ?> value="2"> <?php echo $rumput[$i][1].' mendekati sedikit lebih penting dari '.$rumput[$ii][1].' (2)'; ?></option>
    <option <?php if ($nilai == 3) {echo "selected";} ?> value="3"> <?php echo $rumput[$i][1]. ' sedikit lebih penting dari '.$rumput[$ii][1].' (3)'; ?></option>
    <option <?php if ($nilai == 4) {echo "selected";} ?> value="4"> <?php echo $rumput[$i][1].' mendekati lebih penting dari '.$rumput[$ii][1].' (4)'; ?></option>
    <option <?php if ($nilai == 5) {echo "selected";} ?> value="5"> <?php echo $rumput[$i][1].' lebih penting dari '.$rumput[$ii][1].' (5)'; ?></option>
    <option <?php if ($nilai == 6) {echo "selected";} ?> value="6"> <?php echo $rumput[$i][1].' mendekati sangat lebih penting dari '.$rumput[$ii][1].' (6)'; ?></option>
    <option <?php if ($nilai == 7) {echo "selected";} ?> value="7"> <?php echo $rumput[$i][1].' sangat lebih penting dari '.$rumput[$ii][1].' (7)'; ?></option>
    <option <?php if ($nilai == 8) {echo "selected";} ?> value="8"> <?php echo $rumput[$i][1].' mendekati mutlak sangat lebih penting dari '.$rumput[$ii][1].' (8)'; ?></option>
    <option <?php if ($nilai == 9) {echo "selected";} ?> value="9"> <?php echo $rumput[$i][1].' mutlak sangat lebih penting dari '.$rumput[$ii][1].' (9)'; ?></option>
    <option <?php if ($nilai == 0.5) {echo "selected";} ?> value="0.5"> <?php echo $rumput[$ii][1].' mendekati sedikit lebih penting dari '.$rumput[$i][1].' (0.5)'; ?></option>
    <option <?php if ($nilai == 0.333) {echo "selected";} ?> value="0.333"> <?php echo $rumput[$ii][1].' sedikit lebih penting dari '.$rumput[$i][1].' (0.333)'; ?></option>
    <option <?php if ($nilai == 0.25) {echo "selected";} ?> value="0.25"> <?php echo $rumput[$ii][1].' mendekati lebih penting dari '.$rumput[$i][1].' (0.25)'; ?></option>
    <option <?php if ($nilai == 0.2) {echo "selected";} ?> value="0.2"> <?php echo $rumput[$ii][1].' lebih penting dari '.$rumput[$i][1].' (0.2)'; ?></option>
    <option <?php if ($nilai == 0.167) {echo "selected";} ?> value="0.167"> <?php echo $rumput[$ii][1].' mendekati sangat lebih penting dari '.$rumput[$i][1].' (0.167)'; ?></option>
    <option <?php if ($nilai == 0.143) {echo "selected";} ?> value="0.143"> <?php echo $rumput[$ii][1].' sangat lebih penting dari '.$rumput[$i][1].' (0.143)'; ?></option>
    <option <?php if ($nilai == 0.125) {echo "selected";} ?> value="0.125"> <?php echo $rumput[$ii][1].' mendekati mutlak sangat lebih penting dari '.$rumput[$i][1].' (0.125)'; ?></option>
    <option <?php if ($nilai == 0.111) {echo "selected";} ?> value="0.111"> <?php echo $rumput[$ii][1].' mutlak sangat lebih penting dari '.$rumput[$i][1].' (0.111)'; ?></option>
</select>
				</td>
				
			  </tr>
<?php
		}
	}
}
?>
	  <tr>
		<td align="center" colspan="3"><center><button type="submit" name="save" class="btn btn-success"><i class="icon-ok"></i> Simpan</button></center></td>
	  </tr>
	</tbody>
</table>
</form>