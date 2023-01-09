<?php
$link_list='?hal=data_rumput';
$link_update='?hal=update_rumput';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$nama_rumput=$_POST['nama_rumput'];
	$pk=$_POST['pk'];
	$sk=$_POST['sk'];
	$produktivitas=$_POST['produktivitas'];
	
	if(empty($nama_rumput) or empty($pk) or empty($sk) or empty($produktivitas)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	} else {
		if($action=='add'){
				mysql_query("insert into rumput (nama_rumput,pk,sk,produktivitas) values('".$nama_rumput."', '".$pk."', '".$sk."', '".$produktivitas."')");

				exit("<script>location.href='".$link_list."';</script>");	
			}
		}
		if($action=='edit'){


				$q="update rumput set nama_rumput='".$nama_rumput."', pk='".$pk."', sk='".$sk."', produktivitas='".$produktivitas."' where id_rumput='".$id."'";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			
		}
} else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysql_query("select * from rumput where id_rumput='".$id."'");
		$h=mysql_fetch_array($q);
		$id_rumput=$h['id_rumput'];
		$nama_rumput=$h['nama_rumput'];
		$pk=$h['pk'];
		$sk=$h['sk'];
		$produktivitas=$h['produktivitas'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysql_query("delete from nilai_alternatif where id_rumput1='".$id."' or id_rumput2='".$id."'");
		mysql_query("delete from rumput where id_rumput='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}


?>

<h3 class="p2">Data rumput </h3>

<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id;?>">
<input name="action" type="hidden" value="<?php echo $action;?>">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
?>

<table width="100%" border="0" cellspacing="4" cellpadding="4" class="tabel_reg">
  <tr>
	<td>Nama rumput <span class="required">*</span> </td>
	<td><input name="nama_rumput" type="text" size="40" value="<?php echo $nama_rumput;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Protein Kasar <span class="required">*</span> </td>
	<td><input name="pk" type="text" size="40" value="<?php echo $pk;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Serat Kasar <span class="required">*</span> </td>
	<td><input name="sk" type="text" size="40" value="<?php echo $sk;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Produktivitas <span class="required">*</span> </td>
	<td><input name="produktivitas" type="text" size="40" value="<?php echo $produktivitas;?>" class="m-wrap large"></td>
  </tr>

  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i>Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $link_list;?>'">Batal</button></td>
  </tr>
</table>
</form>
