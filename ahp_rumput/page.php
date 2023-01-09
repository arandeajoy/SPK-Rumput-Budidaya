<?php
$page=$_GET['hal'];
switch($page){

	case 'data_rumput':
		$page="include 'includes/p_rumput.php';";
		break;
	case 'data_kriteria':
		$page="include 'includes/p_kriteria.php';";
		break;
	case 'update_kriteria':
		$page="include 'includes/p_kriteria_update.php';";
		break;
	case 'ubah_password':
		$page="include 'includes/p_ubah_password.php';";
		break;
	case 'nilai_kriteria':
		$page="include 'includes/p_nilai_kriteria.php';";
		break;
	case 'update_rumput':
		$page="include 'includes/p_rumput_update.php';";
		break;
	case 'data_kriteria_rumput':
		$page="include 'includes/p_kriteria_rumput.php';";
		break;
	case 'update_kriteria_rumput':
		$page="include 'includes/p_kriteria_rumput_update.php';";
		break;
	case 'nilai_kriteria_rumput':
		$page="include 'includes/p_nilai_kriteria_rumput.php';";
		break;
	case 'nilai_rumput':
		$page="include 'includes/p_nilai_rumput.php';";
		break;
	case 'hasil_rumput':
		$page="include 'includes/p_hasil_rumput.php';";
		break;

	default:
		$page="include 'includes/p_home.php';";
		break;
}
$CONTENT_["main"]=$page;

?>