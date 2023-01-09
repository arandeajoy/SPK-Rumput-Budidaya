<?php
$db_host = 'localhost';
$db_user = 'root';
$db_name = 'ahprumput';
$db_password='';

$web_host='http://localhost/ahp_rumput/?hal=data_rumput';

$link=mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name,$link);

?>