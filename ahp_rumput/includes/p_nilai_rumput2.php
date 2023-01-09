<?php
$link_update='?hal=nilai_rumput';

session_start();
$q="select * from rumput";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$rumput[]=array($h['id_rumput'],$h['nama_rumput']);
}

$id_kriteria=$_POST['kriteria'];
echo "$id_kriteria";
 
if(isset($_POST['save'])){

	$id_kriteria=$_POST['id_kriteria'];
	mysql_query("delete from nilai_alternatif where id_kriteria='".$id_kriteria."'"); /* kosongkan tabel nilai_alternatif berdasarkan kriteria */
	for($i=0;$i<count($rumput);$i++){
		for($ii=0;$ii<count($rumput);$ii++){
			if($i < $ii){
				mysql_query("insert into nilai_alternatif(id_kriteria,id_rumput1,id_rumput2,nilai) values('".$id_kriteria."',
					'".$rumput[$i][0]."','".$rumput[$ii][0]."','".$_POST['nilai_'.$rumput[$i][0].'_'.$rumput[$ii][0]]."')");
			}
		}
	}
	$success='Penilaian rumput berhasil disimpan.';
}
if(isset($_POST['reset'])){
	$id_kriteria=$_POST['id_kriteria'];
	mysql_query("delete from nilai_alternatif where id_kriteria='".$id_kriteria."'"); /* kosongkan tabel nilai_rumput berdasarkan kriteria */
}

for($i=0;$i<count($rumput);$i++){
	echo "$rumput[$i][0]";
	echo "$rumput[$ii][0]";
	for($ii=0;$ii<count($rumput);$ii++){
		if($i < $ii){
			$q=mysql_query("select nilai from nilai_alternatif where id_kriteria='".$id_kriteria."' and id_rumput1='".$rumput[$i][0]."' and id_rumput2='".$rumput[$ii][0]."'");
			if(mysql_num_rows($q)>0){
				$h=mysql_fetch_array($q);
				$nilai=$h['nilai'];
			}else{
				mysql_query("insert into nilai_alternatif(id_kriteria,id_rumput1,id_rumput2,nilai) values('".$id_kriteria."','".$rumput[$i][0]."','".$rumput[$ii][0]."','1')");
				$nilai=1;
			}
			$selected[$nilai]='selected';
			
			$daftar.='
			  <tr>
				<td align="right">'.$rumput[$i][1].'</td>
				<td>'.$rumput[$ii][1].'</td>
				<td align="center">

<select style="width:350px" id="nilai" name="nilai_'.$rumput[$i][0].'_'.$rumput[$ii][0].'">
 <option '.if ($nilai == '1') { echo 'selected'; }.' value="1">'.$rumput[$i][1].' Sama penting dengan '.$rumput[$ii][1].' (1)</option>
    <option '.if ($nilai == '2') { echo 'selected'; }.' value="2">'.$rumput[$i][1].' Mendekati sedikit lebih penting dari '.$rumput[$ii][1].' (2)</option>
    <option '.if ($nilai == '3') { echo 'selected'; }.' value="3">'.$rumput[$i][1].' Sedikit lebih penting dari '.$rumput[$ii][1].' (3)</option>
    <option '.if ($nilai == '4') { echo 'selected'; }.' value="4">'.$rumput[$i][1].' Mendekati lebih penting dari '.$rumput[$ii][1].' (4)</option>
    <option '.if ($nilai == '5') { echo 'selected'; }.' value="5">'.$rumput[$i][1].' Lebih penting dari '.$rumput[$ii][1].' (5)</option>
    <option '.if ($nilai == '6') { echo 'selected'; }.' value="6">'.$rumput[$i][1].' Mendekati sangat penting dari '.$rumput[$ii][1].' (6)</option>
    <option '.if ($nilai == '7') { echo 'selected'; }.' value="7">'.$rumput[$i][1].' Sangat penting dari '.$rumput[$ii][1].' (7)</option>
    <option '.if ($nilai == '8') { echo 'selected'; }.' value="8">'.$rumput[$i][1].' Mendekati mutlak dari '.$rumput[$ii][1].' (8)</option>
    <option '.if ($nilai == '9') { echo 'selected'; }.' value="9">'.$rumput[$i][1].' Mutlak sangat penting dari '.$rumput[$ii][1].' (9)</option>
    <option '.if ($nilai == '0.5') { echo 'selected'; }.' value="0.5">'.$rumput[$ii][1].' Mendekati sedikit lebih penting dari '.$rumput[$i][1].' (0.5)</option>
    <option '.if ($nilai == '0.333') { echo 'selected'; }.' value="0.333">'.$rumput[$ii][1].' Sedikit lebih penting dari '.$rumput[$i][1].' (0.333)</option>
    <option '.if ($nilai == '0.25') { echo 'selected'; }.' value="0.25">'.$rumput[$ii][1].' Mendekati lebih penting dari '.$rumput[$i][1].' (0.25)</option>
    <option '.if ($nilai == '0.2') { echo 'selected'; }.' value="0.2">'.$rumput[$ii][1].' Lebih penting dari '.$rumput[$i][1].' (0.2)</option>
    <option '.if ($nilai == '0.167') { echo 'selected'; }.' value="0.167">'.$rumput[$ii][1].' Mendekati sangat penting dari '.$rumput[$i][1].' (0.167)</option>
    <option '.if ($nilai == '0.143') { echo 'selected'; }.' value="0.143">'.$rumput[$ii][1].' Sangat penting dari '.$rumput[$i][1].' (0.143)</option>
    <option '.if ($nilai == '0.125') { echo 'selected'; }.' value="0.125">'.$rumput[$ii][1].' Mendekati mutlak dari '.$rumput[$i][1].' (0.125)</option>
    <option '.if ($nilai == '0.111') { echo 'selected'; }.' value="0.111">'.$rumput[$ii][1].' Mutlak sangat penting dari '.$rumput[$i][1].' (0.111)</option>
</select>
				</td>
				
			  </tr>
			';
			$selected[$nilai]='';
		}
	}
}

$q="select * from kriteria";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	if($h['id_kriteria']==$id_kriteria){$s='selected';}
	$list_kriteria_rumput.='<option value="'.$h['id_kriteria'].'"'.$s.'>'.$h['nama_kriteria'].'</option>';
}

?>

<h3 class="p2">Penilaian rumput</h3>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<table class="table table-striped table-hover table-bordered">
	<tbody>
		<tr>
			<td width="100">Kriteria rumput</td>
			<td><select name="kriteria" class="medium m-wrap" onchange="submit()"><?php echo $list_kriteria_rumput;?></select></td>
			<?php echo "$id_kriteria"; ?>
		</tr>
	</tbody>
</table>
</form>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<input name="id_kriteria" type="hidden" value="<?php echo $id_kriteria;?>" />
<?php
if(!empty($success)){
	echo '
	   <div class="alert alert-success ">
		  '.$success.'
	   </div>
	';
}
?>

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Rumput A</th>
			<th>Rumput B</th>
			<th>Nilai Perbandingan</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $daftar;?>
	  <tr>
		<td align="center" colspan="3"><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button>
		<button type="submit" name="reset" class="btn" onclick="return(ResetConfirm());">Reset Nilai</button></td>
	  </tr>
	</tbody>
</table>
</form>
