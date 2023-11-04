<?php
include 'login/config.php';
include '../Users/Pilih/koneksi.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login");
    exit(); // Terminate script execution after the redirect
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<meta http-equiv="REFRESH" content="2;url=">
<head>
<title></title>
</head>
<body>
<label>
<p><?php
$sql = 'SELECT suara
		FROM kandidat';
		
$query = mysqli_query($koneksi, $sql);

$row = mysqli_fetch_array($query);
echo 'Kandidat 1: ' . $row['suara'] . '</br/>';

$row = mysqli_fetch_array($query);
echo 'Kandidat 2: ' . $row['suara'] . '</br/>';

$row = mysqli_fetch_array($query);
echo 'Kandidat 3: ' . $row['suara'] . '</br/>';

$row = mysqli_fetch_array($query);
echo 'Kandidat 4: ' . $row['suara'] . '</br/>';

$row = mysqli_fetch_array($query);
echo 'Kandidat 5: ' . $row['suara'] . '</br/>';?></php></p>
</label>
<br>
<br>
<br>
<a href="../Users/Login/logout.php">keluar</a>
</body>
</html>