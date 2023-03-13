<?php
include "config.php";
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
            <h1 class="ct">Cart Items</h1>
            <div class="topnav">
                <a href='products.php' class="hm">Home</a>
            </div>
            <table class='table'>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                <?php
                if (isset($_GET["del"])) {
                    foreach ($_SESSION["cart"] as $keys => $values) {
                        if ($values["pid"] == $_GET["del"]) {
                            unset($_SESSION["cart"][$keys]);
                        }
                    }
                }
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $values) {
                        $amt = $values["qty"] * $values["price"];
                        $total += $amt;
                        echo "
											<tr>
												<td>{$values["pname"]}</td>
												<td>{$values["qty"]}</td>
												<td>{$values["price"]}</td>
												<td>{$amt}</td>
												<td><a href='viewcart.php?del={$values["pid"]}'>Remove</a></td>
											</tr>
									";
                    }
                    echo "
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td>{$total}</td>
											</tr>";
                } else {
                    echo "<script>alert('Please select the products..');</script>";
                    header("location:products.php");
                }
                ?>
            </table>

        </div>
    </div>

</body>

</html>