<?php
include "config.php";
include "login.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mobile Kart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <h1 class="mt">Mobile Products</h1>
            <div class="topnav">
                <a href='viewcart.php' class="vc">View Cart</a>
            </div>
            <?php
            if (isset($_POST["addCart"])) {
                if (isset($_SESSION["cart"])) {
                    $pid_array = array_column($_SESSION["cart"], "pid");
                    if (!in_array($_GET["id"], $pid_array)) {
                        $index = count($_SESSION["cart"]);
                        $item = array(
                            'pid' => $_GET["id"],
                            'pname' => $_POST["pname"],
                            'price' => $_POST["price"],
                            'qty' => $_POST["qty"]
                        );
                        $_SESSION["cart"][$index] = $item;
                        echo "<script>alert('Product Added..');</script>";
                        header("location:viewcart.php");
                    } else {
                        echo "<script>alert('Already Added..');</script>";
                    }
                } else {
                    $item = array(
                        'pid' => $_GET["id"],
                        'pname' => $_POST["pname"],
                        'price' => $_POST["price"],
                        'qty' => $_POST["qty"]
                    );
                    $_SESSION["cart"][0] = $item;
                    echo "<script>alert('Product Added..');</script>";
                    header("location:viewcart.php");
                }
            }

            $sql = "select * from products where pid='{$_GET["id"]}'";
            $res = $con->query($sql);
            if ($res->num_rows > 0) {
                echo '<form action="' . $_SERVER["REQUEST_URI"] . '" method="post">';
                if ($row = $res->fetch_assoc()) {
                    echo  '
   <div class="col-sm-4 col-lg-3 col-md-3 text-center">    
     <img src="images/' . $row['PIC'] . '" alt="" class="img-responsive" >
     <p><strong><a href="#"class="text-decoration-none">' . $row['PNAME'] . '</a></strong></p>
     <h4 class="text-danger"> Rs.' . $row['PRICE'] . '</h4>
     <p>Display : ' . $row['DISPLAY'] . ' </p>
     <p>Brand : ' . $row['BNAME'] . '</p>
     <p>RAM : ' . $row['RAM'] . ' GB</p>
     <p>Storage : ' . $row['STORAGE'] . ' GB </p>
	<p><input type="text"  placeholder="Enter Qty" name="qty"  class="form-control"></p>
	<p><input type="hidden"  name="pname" value="' . $row['PNAME'] . '" class="form-control"></p>
	<p><input type="hidden"  name="price" value="' . $row['PRICE'] . '" class="form-control"></p>
	<p><input type="submit" name="addCart" class="btn btn-success" value="Add to Cart"></p>
   </div>
   ';
                }
                echo '</form>';
            }
            ?>
        </div>
    </div>

</body>

</html>