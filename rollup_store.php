<?php

include_once('connect.php');
global $conn;

// name < county < state < region < all

//echo "Hello";

//echo $GLOBALS['store'];

if ( $GLOBALS['store'] == 'name' )
{
	
}
else if ( $GLOBALS['store'] == 'county' )
{
	
}
else if ( $GLOBALS['store'] == 'state' ) //show region
{
	$GLOBALS['store'] == 'region';

	if ( $GLOBALS['time'] == 'date' )
	{
		
	}
	else if ( $GLOBALS['time'] == 'month' )
	{
		$rollup = "select t.month, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by s.sales_region, t.month, p.category;";

			$result = $conn->query($rollup);

			//$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Month</th>" .
			    	"<th>Category</th>" .
			    	"<th>Sales Region</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["month"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["sales_region"] . "</td>" .
			         	"<td>". $row["total_unit_sold"] . "</td>" .
			         	"<td>". $row["customer_count"] . "</td>" .
			         	"<td>". $row["revenue"] . "</td>" .
			         	"<td>". $row["profit"] . "</td>" .
			         	"</tr>";
			    }
			    echo "</table>";
			    //echo "<script> $('#testing').html('Worked!!!''); </script>";
			    //echo $result_string;
			    echo "A thing happened";
			} 

			else 
			{
			    echo '0 results';
			}
	}
	else if ( $GLOBALS['time'] == 'fiscal' )
	{
		$rollup = "select t.fiscal_period, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by s.sales_region, t.fiscal_period, p.category;";

			$result = $conn->query($rollup);

			//$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Fiscal Quarter</th>" .
			    	"<th>Category</th>" .
			    	"<th>Sales Region</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["fiscal_period"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["sales_region"] . "</td>" .
			         	"<td>". $row["total_unit_sold"] . "</td>" .
			         	"<td>". $row["customer_count"] . "</td>" .
			         	"<td>". $row["revenue"] . "</td>" .
			         	"<td>". $row["profit"] . "</td>" .
			         	"</tr>";
			    }
			    echo "</table>";
			    //echo "<script> $('#testing').html('Worked!!!''); </script>";
			    //echo $result_string;
			    echo "A thing happened";
			} 

			else 
			{
			    echo '0 results';
			}
	}
	else // group all dates
	{
		
	}
}
else // all
{
	
}

mysqli_close($conn);