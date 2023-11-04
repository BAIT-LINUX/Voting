<?php
include 'config.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nis = hash('sha256', $_POST['nis']); // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM users WHERE name='$name' AND nis='$nis'";
    $result = mysqli_query($conn, $sql);
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: ../index.php");
        exit();
    } else {
        echo "<script>alert('Name atau NIS Anda salah. Silakan coba lagi!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Pilketos</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                 <form action="" method="POST" class="login-email">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="Nama" name="name" required>
                        <label for="">Nama</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="number" placeholder="NIS" name="nis" required>
                        <label for="">NIS</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>

                    </div>
                    <div class="register">
                    <button name="submit" class="btn">Login</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>