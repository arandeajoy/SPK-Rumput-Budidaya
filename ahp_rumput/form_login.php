<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<title>Sistem Pendukung Keputusan Pemilihan Rumput dengan Metode AHP</title>
<meta name="description" content="Program aplikasi sistem penunjang keputusan (SPK) metode Analytic Hierarchy Process (AHP)" />
<link href="css/login-style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
</head>

<body>

<div id="box_bg">

<div id="content">
	
	<p style="padding:10px">Sistem Pendukung Keputusan Pemilihan Rumput Budidaya dengan Metode AHP</p>
	<center>
	<div id="login">Masukkan Username dan Password Anda<br/>
	<form action="login.php" method="post">
	<input type="text" name="username" onblur="if(this.value=='')this.value='Username';" onfocus="if(this.value=='Username')this.value='';" value="Username" class="login user"/>
	<input type='text' name='password' value='Password'  onfocus="if(this.value=='' || this.value == 'Password') {this.value='';this.type='password'}"  onblur="if(this.value == '') {this.type='text';this.value=this.defaultValue}" class="login password"/>
	<input name="login" type="submit" value="Masuk" class="button green" /> <input name="login" type="button" value="Cancel" class="button green" onclick="location.href='http://localhost/ahp_rumput/';" />
	</form>
	</div></center>
	
	<div style="clear:both"></div>

</div>
</div>

</body>
</html>
