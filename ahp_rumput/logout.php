<?php
error_reporting(0);
session_start();
require_once 'config.php';

session_destroy();
exit("<script>window.location='http://localhost/ahp_rumput/';</script>");

?>