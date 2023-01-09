<?php
$link_update='?hal=nilai_kriteria_rumput';

$q="select * from kriteria";
$q=mysql_query($q);
while($h=mysql_fetch_array($q)){
	$kriteria[]=array($h['id_kriteria'],$h['nama_kriteria']);
}

if(isset($_POST['save'])){
	for($i=0;$i<count($kriteria);$i++){
		for($ii=0;$ii<5;$ii++){
			if($i < $ii){
				mysql_query("update nilai_kriteria set nilai='".$_POST['nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0]]."' where id_kriteria1='".$kriteria[$i][0]."' and id_kriteria2='".$kriteria[$ii][0]."'");
			}
		}
	}
	exit("<script>window.location='http://localhost/ahp_rumput/?hal=hasil_rumput';</script>");
}

for($i=0;$i<count($kriteria);$i++){
	for($ii=0;$ii<count($kriteria);$ii++){
		if($i < $ii){
			$q=mysql_query("select nilai from nilai_kriteria where id_kriteria1='".$kriteria[$i][0]."' and id_kriteria2='".$kriteria[$ii][0]."'");
				$h=mysql_fetch_array($q);
				$nilai=$h['nilai'];
			$row=count($kriteria)-1;
			
			$daftar.='
			  <tr>
				<td align="right">'.$kriteria[$i][1].'</td>
				<td>'.$kriteria[$ii][1].'</td>
				<td align="center">

<select style="width:500px" id="nilai" name="nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0].'">
    <option value="1">'.$kriteria[$i][1].' Sama pentingnya dengan '.$kriteria[$ii][1].' (1)</option>
    <option value="2">'.$kriteria[$i][1].' Mendekati sedikit lebih penting dari '.$kriteria[$ii][1].' (2)</option>
    <option value="3">'.$kriteria[$i][1].' Sedikit lebih penting dari '.$kriteria[$ii][1].' (3)</option>
    <option value="4">'.$kriteria[$i][1].' Mendekati lebih penting dari '.$kriteria[$ii][1].' (4)</option>
    <option value="5">'.$kriteria[$i][1].' Lebih penting dari '.$kriteria[$ii][1].' (5)</option>
    <option value="6">'.$kriteria[$i][1].' Mendekati sangat lebihpenting dari '.$kriteria[$ii][1].' (6)</option>
    <option value="7">'.$kriteria[$i][1].' Sangat lebih penting dari '.$kriteria[$ii][1].' (7)</option>
    <option value="8">'.$kriteria[$i][1].' Mendekati mutlak sangat lebih penting dari '.$kriteria[$ii][1].' (8)</option>
    <option value="9">'.$kriteria[$i][1].' Mutlak sangat lebih penting dari '.$kriteria[$ii][1].' (9)</option>
    <option value="0.5">'.$kriteria[$ii][1].' Mendekati sedikit lebih penting dari '.$kriteria[$i][1].' (0.5)</option>
    <option value="0.333">'.$kriteria[$ii][1].' Sedikit lebih penting dari '.$kriteria[$i][1].' (0.333)</option>
    <option value="0.25">'.$kriteria[$ii][1].' Mendekati lebih penting dari '.$kriteria[$i][1].' (0.25)</option>
    <option value="0.2">'.$kriteria[$ii][1].' Lebih penting dari '.$kriteria[$i][1].' (0.2)</option>
    <option value="0.167">'.$kriteria[$ii][1].' Mendekati sangat lebih penting dari '.$kriteria[$i][1].' (0.167)</option>
    <option value="0.143">'.$kriteria[$ii][1].' Sangat lebih penting dari '.$kriteria[$i][1].' (0.143)</option>
    <option value="0.125">'.$kriteria[$ii][1].' Mendekati mutlak sangat lebih penting dari '.$kriteria[$i][1].' (0.125)</option>
    <option value="0.111">'.$kriteria[$ii][1].' Mutlak sangat lebih penting dari '.$kriteria[$i][1].' (0.111)</option>
</select>
				</td>
			</tr>
			';
		}
	}
}


?>
<script language="javascript">
function ResetConfirm(){
	if (confirm("Anda yakin akan mengatur ulang semua nilai perbandingan kriteria ini ?")){
		return true;
	}else{
		return false;
	}
}
</script>

<h3 class="p2">Penilaian Kriteria Rumput</h3>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Kriteria 1</th>
			<th>Kriteria 2</th>
			<th>Nilai Perbandingan</th>
			
		</tr>
	</thead>
	<tbody>
		<?php echo $daftar;?> 
	  <tr>
		<td align="center" colspan="3"><center><button type="submit" name="save" class="btn btn-success">Proses</button></center>
	  </tr>
	</tbody>
</table>

</form>
