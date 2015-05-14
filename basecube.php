<?php
	//global $conn;

	include_once('connect.php');

	//$GLOBALS['time'] = 'month'; // date < month < fiscal < year < all
	//$GLOBALS['product'] = 'category'; // description < department < subcategory < category < all
	//$GLOBALS['store'] = 'state'; // name < county < state < region < all

	global $conn;

	$reset_vars = 'update vars set time="month", product="category", store="state" where id=1';
	$conn->query($reset_vars);

	$basecube = "select t.month, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by s.store_state, p.category, t.Month;";

	$result = $conn->query($basecube);

	if ($result->num_rows > 0) 
	{
	    // output data of each row
	    echo "<table><tr>" .
	    	"<th>Month</th>" .
	    	"<th>Category</th>" .
	    	"<th>State</th>" .
	    	"<th>Units Sold</th>" .
	    	"<th>Total Customers</th>" .
	    	"<th>Revenue</th>" .
	    	"<th>Profit</th></tr>";
	    while($row = $result->fetch_assoc()) 
	    {
	         echo '<tr>' . 
	         	'<td>'. $row["month"] . '</td>' .
	         	'<td>'. $row["category"] . '</td>' .
	         	'<td>'. $row["store_state"] . '</td>' .
	         	'<td>'. $row["total_unit_sold"] . '</td>' .
	         	'<td>'. $row["customer_count"] . '</td>' .
	         	'<td>'. $row["revenue"] . '</td>' .
	         	'<td>'. $row["profit"] . '</td>' .
	         	'</tr>';
	    }
	    echo "</table>";
	    //echo "<script> $('#testing').html('Worked!!!''); </script>";
	} else {
	    echo "0 results";
	}