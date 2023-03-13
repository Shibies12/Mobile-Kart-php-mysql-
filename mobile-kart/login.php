<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $con = mysqli_connect("localhost", "root", "", "mobile");
    $sql = "SELECT * from register WHERE username='$username' AND pwd='$password'";
    $result = mysqli_query($con, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck > 0) {
        echo "<script>alert('Login Success');</script>";
        header("location:products.php");
    } else {
        echo "username or password incorrect";
    }
}
