<?php
include "config.php";
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
            <div class="bar">
                <h1 class="mp">Mobile Products</h1>
                <div class="topnav">
                    <a href="http://localhost/MOBILE-KART/index.html" style="text-decoration: none;" class="rbt">Register</a>
                    <a href="http://localhost/MOBILE-KART/login.html" class="lbt">Login</a>
                </div>
            </div>
            <?php
            $sql = "select * from products";
            $res = $con->query($sql);
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo  '
   <div class="col-sm-4 col-lg-3 col-md-3 text-center">
    
     <img src="images/' . $row['PIC'] . '" alt="" class="img-responsive" >
     <p><strong><a href="#" class="text-decoration-none">' . $row['PNAME'] . '</a></strong></p> 
     <h4 class="text-danger"> Rs.' . $row['PRICE'] . '</h4>
	<p><a href="view.php?id=' . $row['PID'] . '" class="btn btn-success">View Details</a></p>

   </div>
   ';
                }
            }
            ?>
        </div>
    </div>

</body>

</html>