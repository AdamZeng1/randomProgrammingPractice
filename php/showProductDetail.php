<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- add css sheet -->
    <?php echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>"; ?>
    <?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/util.css\" />"; ?>
    <?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/checkoutForm.css\" />"; ?>
</head>
<body>

<?php


if (isset($_REQUEST['data'])) {

    // if get the request data from the html, just try to get the data from the database

//    $connection = mysqli_connect('rerun.it.uts.edu.au', 'potiro', 'pcXZb(kL', 'poti');
    $connection = mysqli_connect('localhost:3306', 'root', 'zengweihan', 'assignment');

    $ID = $_REQUEST['data'];

    // Store current product ID in session;
    $_SESSION["currentID"] = $ID;


    $query_string = "select * from products where product_id = " . $ID;
    $result = mysqli_query($connection, $query_string);

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        if ($a_row = mysqli_fetch_array($result)) {
            print "<table class='product-table' border='1'>";

            print "<tr>";
            print "<th>product_id</th>";
            print "<th>product_name</th>";
            print "<th>unit_price</th>";
            print "<th>unit_quantity</th>";
            print "<th>in_stock</th>";
            print "</tr>";


            print "<tr>";
            echo "<td>" . $a_row["product_id"] . "</td>";
            echo "<td>" . $a_row["product_name"] . "</td>";
            echo "<td>" . $a_row["unit_price"] . "</td>";
            echo "<td>" . $a_row["unit_quantity"] . "</td>";
            echo "<td>" . $a_row["in_stock"] . "</td>";
            print "</tr>";
        }

        print "</table>";

        // add $a_row to $_SESSION["currentProduct"] = $a_row;
        $_SESSION["currentProduct"] = $a_row;

        echo '<div class="linkbtn">
						<a href="bottom-right.php"  id="addbtn" target="bottom-right" type="button" class="add-button">
						ADD
						</a>
					  </div>';


    }
    mysqli_close($connection);


} elseif(isset($_SESSION['showCheckout']) && ($_SESSION['showCheckout'] == 1) &&(count($_SESSION["products"])) )
{
    require('checkoutform.php');
}else
{
    echo "Please select products on the left menus, and add to the shopping cart";
}
?>



<!--<p id="demo"></p>-->
<!--<p id="demo1"></p>-->
<!--<script>-->
<!--    var counter = 0;-->
<!---->
<!--    document.getElementById("addbtn").onclick = myFunction;-->
<!---->
<!--    // document.getElementById("add-button").onclick=myFunction;-->
<!--    function myFunction() {-->
<!--        counter += 1;-->
<!--        document.getElementById("demo").innerHTML = counter;-->
<!--    }-->
<!--</script>-->

</body>
</html>
