
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="menu.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <style>
      body{
         background-color:    #006030;
      }
   </style>
   <title>Menu Utama</title>
</head>
<body>

<?php if ($_SESSION['level_id']=='admin'){ ?>
<div id='cssmenu'>
<ul>
   <li><a href='?hal=data_rumput'><span>Data Rumput</span></a></li>
   <li><a href='?hal=nilai_rumput'><span>Penilaian Alternatif</span></a></li>
   <li class="last"><a href="logout.php">Keluar</a></li>
</ul>
</div>
<?php } 
else { ?>
<div id='cssmenu'>

<ul>
   <li><a href='./'><span>Data Rumput</span></a></li>
   <li><a href='?hal=nilai_kriteria_rumput'><span>Penilaian Kriteria</span></a></li>
   <li class='last'><a href='form_login.php'><span>Masuk</span></a></li>
</ul></div>
<?php } ?>


</body>
<html>
