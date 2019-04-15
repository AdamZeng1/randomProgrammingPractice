<?php

if (isset($_REQUEST['data'])) {

    // if get the request data from the html, just try to get the data from the database

//    $connection = mysqli_connect('rerun.it.uts.edu.au', 'potiro', 'pcXZb(kL', 'poti');
    $connection = mysqli_connect('localhost:3306', 'root', 'zengweihan', 'assignment');

    $id = $_REQUEST['data'];


    $query_string = "select * from products where product_id = " . $id;
    $result = mysqli_query($connection, $query_string);


    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        print "<table border='1'> ";

        if ($a_row = mysqli_fetch_array($result)) {
            print "<br>";

            {
                echo $a_row["product_name"] . "<br>";
                echo $a_row["unit_price"] . "<br>";
                echo $a_row["unit_quantity"] . "<br>";
                echo $a_row["in_stock"] . "<br>";

            }
        }

        print "</table>";


        // display a button here
        print "<button type=\"button\" style=\"position:absolute;bottom:8px;right:16px;font-size:18px;background-color:#4CAF50;\">Add</button>";
    }
    mysqli_close($connection);


} else {
    echo "This is top-right.";
}


?>