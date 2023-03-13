<?php
if (isset($_POST['submit'])) {

    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $num = $_POST['num'];

    $con = mysqli_connect("localhost", "root", "", "mobile");
    $sql = "INSERT INTO register(username,email,pwd,num) VALUES ('$uname','$email','$pwd','$num')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('New record inserted Successfully');</script>";
        header("location:login.html");
    } else {
        echo "Not added successfully ";
    }
}
