<?php
$q="select * from rumput";
$q=mysql_query($q);
if(mysql_num_rows($q) > 0){
  while($h=mysql_fetch_array($q)){
    $no++;
    $daftar.='
      <tr>
      <td valign="top">'.$no.'</td>
      <td valign="top">'.$h['nama_rumput'].'</td>
      <td valign="top">'.$h['pk'].'%</td>
      <td valign="top">'.$h['sk'].'%</td>
      <td valign="top">'.$h['produktivitas'].'</td>
      </tr>
    ';
  }
}

?>

<h3 class="p2">Data Rumput</h3>

<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th width="40">No</th>
      <th width="160">Jenis Rumput</th>
      <th>Protein Kasar</th>
      <th>Serat Kasar</th>
      <th>Produktivitas</th>
    </tr>
  </thead>
  <tbody>
    <?php echo $daftar;?>
  </tbody>
</table>
