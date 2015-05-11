<?php

include_once('connect.php');
global $conn;

// date < month < fiscal < year < all

//echo "Hello";

echo $GLOBALS['time'];

if ( $GLOBALS['time'] == 'date' )
{
	
}
else if ( $GLOBALS['time'] == 'month' )
{
	$GLOBALS['time'] = 'fiscal';
	//echo "Yes";
	if ( $GLOBALS['product'] == 'description' )
	{
		
	}
	else if ( $GLOBALS['product'] == 'department' )
	{
		
	}
	else if ( $GLOBALS['product'] == 'subcategory' )
	{
		
	}
	else // category
	{
		//echo "Category";
		if ( $GLOBALS['store'] == 'name' )
		{
			
		}
		else if ( $GLOBALS['store'] == 'county' )
		{
			
		}
		else if ( $GLOBALS['store'] == 'state' ) // base cube options
		{
			
			//echo "Hello state";
			
			$rollup = "select t.fiscal_period, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.fiscal_period, p.category, s.store_state;";

			$result = $conn->query($rollup);

			$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Fiscal Quarter</th>" .
			    	"<th>Category</th>" .
			    	"<th>State</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["fiscal_period"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["store_state"] . "</td>" .
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

			else {
			    echo '0 results';
			}
			
		}
		else //region
		{

		}
	}
}
else if ( $GLOBALS['time'] == 'fiscal' )
{
	/*$GLOBALS['time'] = 'year';
	//echo "Yes";
	if ( $GLOBALS['product'] == 'description' )
	{
		
	}
	else if ( $GLOBALS['product'] == 'department' )
	{
		
	}
	else if ( $GLOBALS['product'] == 'subcategory' )
	{
		
	}
	else // category
	{
		//echo "Category";
		if ( $GLOBALS['store'] == 'name' )
		{
			
		}
		else if ( $GLOBALS['store'] == 'county' )
		{
			
		}
		else if ( $GLOBALS['store'] == 'state' ) // base cube options
		{
			
			//echo "Hello state";
			
			$rollup = "select t.year, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.year, p.category, s.store_state;";

			$result = $conn->query($rollup);

			$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Year</th>" .
			    	"<th>Category</th>" .
			    	"<th>State</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["year"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["store_state"] . "</td>" .
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

			else {
			    echo '0 results';
			}
			
		}
		else //region
		{

		}
	}*/
	echo "Hello year";
}
else // group all dates
{
	
}

mysqli_close($conn);