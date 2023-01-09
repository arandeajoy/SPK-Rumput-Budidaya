<?php
$link_list='?hal=data_rumput';
$link_update='?hal=update_rumput';

$q="select * from rumput";
$q=mysql_query($q);
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$no++;
		$id=$h['id_rumput'];
		$allow_del=true;
		if(mysql_num_rows(mysql_query("select * from nilai_alternatif where id_rumput1='".$id."' limit 0,1"))>0){$allow_del=false;}
		if(mysql_num_rows(mysql_query("select * from nilai_alternatif where id_rumput2='".$id."' limit 0,1"))>0){$allow_del=false;}
		if($allow_del){$disabled='';}else{$disabled='disabled';}
		$daftar.='
		  <tr>
			<td valign="top">'.$no.'</td>
			<td valign="top">'.$h['nama_rumput'].'</td>
			<td valign="top">'.$h['pk'].'%</td>
			<td valign="top">'.$h['sk'].'%</td>
			<td valign="top">'.$h['produktivitas'].'</td>
			<td align="center" valign="top">
				<a href="'.$link_update.'&amp;id='.$id.'&amp;action=edit" class="btn"> <i class="icon-edit"></i></a> 
				<a href="#" onclick="DeleteConfirm(\''.$link_update.'&amp;id='.$id.'&amp;action=delete\');return(false);" class="btn '.$disabled.'"><i class="icon-trash"></i></a>
			</td>
		  </tr>
		';
	}
}


?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
</script>

<h3 class="p2">Data Rumput</h3>
<a href="<?php echo $link_update;?>" class="btn blue" style="float:right"><i class="icon-plus"></i> Tambah Data </a><br /><br />
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th width="40">No</th>
			<th width="160">Jenis Rumput</th>
			<th>Protein Kasar</th>
			<th>Serat Kasar</th>
			<th>Produktivitas</th>
			<th width="90" align="right">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $daftar;?>
	</tbody>
</table>
