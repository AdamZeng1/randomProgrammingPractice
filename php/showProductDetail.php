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

</head>
<body>

<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/util.css\" />";

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


        // display a button here
        print "<form id=\"myForm\" action=\"bottom-right.php\">";
        print "<input type=\"button\" id=\"add-button\" value=\"ADD\" class=\"add-button\" onsubmit=\"return myFunction()\">";
        print "</form>";
    }
    mysqli_close($connection);


} else {
    echo "This is top-right.";
}

?>

<p id="demo"></p>
<p id="demo1"></p>
<script>
    var counter = 0;

    // document.getElementById("add-button").onclick=myFunction;
    function myFunction() {
        counter += 1;
        document.getElementById("demo").innerHTML = counter;
    }
</script>

</body>
</html>
