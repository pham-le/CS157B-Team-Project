<?php
	//global $conn;

	$servername = "localhost";
	$username = "root";
	$password = "rootpass";
	$dbname = "grocery";

	//echo "Test <br/><br/>";

	// Create connection
	//global $conn;
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
		echo "Nope";
	    die("Connection failed: " . $conn->connect_error);
	} 
	//else echo "Success<br/><br/>";

	$selectall = "SELECT time_key, product_key, promotion_key, store_key, dollar_sales, unit_sales, dollar_cost, customer_count FROM sales_fact";

	$result = $conn->query($selectall);

	if ($result->num_rows > 0) 
	{
	    // output data of each row
	    echo "<table><tr><th>time_key</th><th>product_key</th><th>promotion_key</th><th>store_key</th><th>dollar_sales</th><th>unit_sales</th><th>dollar_cost</th><th>customer_count</th></tr>";
	    while($row = $result->fetch_assoc()) 
	    {
	         echo '<tr>' . 
	         	'<td>'. $row["time_key"] . '</td>' .
	         	'<td>'. $row["product_key"] . '</td>' .
	         	'<td>'. $row["promotion_key"] . '</td>' .
	         	'<td>'. $row["store_key"] . '</td>' .
	         	'<td>'. $row["dollar_sales"] . '</td>' .
	         	'<td>'. $row["unit_sales"] . '</td>' .
	         	'<td>'. $row["dollar_cost"] . '</td>' .
	         	'<td>'. $row["customer_count"] . '</td>' .
	         	'</tr>';
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}