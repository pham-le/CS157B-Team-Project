<?php

//include_once('connect.php');
global $conn;

$get_vars = "select * from vars where id=1";
$vars = $conn->query($get_vars);

	if ($vars->num_rows > 0) 
	{
	    while($row = $vars->fetch_assoc()) 
	    {
	         $time = $row["time"];
	         $product = $row["product"];
	         $store = $row["store"];
	    }
	
	}

	if ($time == 'month');
	{
		$time = 'fiscal';

		if ($store == 'state')
		{
			$rollup = "select t.fiscal_period, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.fiscal_period, p.category, s.store_state;";

			$result = $conn->query($rollup);

			//$result_string;

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
			}
		}
	}
	if ($time == 'fiscal');
	{
		$time = 'year';

		if ($store == 'state')
		{
			$rollup = "select t.year, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.year, p.category, s.store_state;";

			$result = $conn->query($rollup);

			//$result_string;

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
			}
		}
	}
	
	$set_vars = 'update vars set time ="' . $time . '", store ="' . $store . '", product ="' . $product . '" where id=1;';
	$conn->query($set_vars);

	//echo $time . " " . $product . " " . $store;
















	/*


// date < month < fiscal < year < all

//echo "Hello";

//echo $GLOBALS['time'];

if ( $GLOBALS['time'] == 'date' )
{
	$GLOBALS['time'] = 'month';
	//echo "Yes";
	if ( $GLOBALS['product'] == 'description' ) // month description *
	{
		if ( $GLOBALS['store'] == 'name' ) // month description name
		{

		}
		else if ( $GLOBALS['store'] == 'county' ) // month description county
		{
			
		}
		else if ( $GLOBALS['store'] == 'state' ) // month description state
		{
			
		}
		else if ( $GLOBALS['store'] == 'region' ) // month description region
		{
			
		}
		else // month description only
		{

		}
	}
	else if ( $GLOBALS['product'] == 'department' ) // month department *
	{
		if ( $GLOBALS['store'] == 'name' ) // month department name
		{

		}
		else if ( $GLOBALS['store'] == 'county' ) // month department county
		{
			
		}
		else if ( $GLOBALS['store'] == 'state' ) // month department state
		{
			
		}
		else if ( $GLOBALS['store'] == 'region' ) // month department region
		{
			
		}
		else // month department only
		{

		}
	}
	else if ( $GLOBALS['product'] == 'subcategory' ) // month subcategory *
	{
		if ( $GLOBALS['store'] == 'name' ) // month subcategory name
		{

		}
		else if ( $GLOBALS['store'] == 'county' ) // month subcategory county
		{
			
		}
		else if ( $GLOBALS['store'] == 'state' ) // month subcategory state
		{
			
		}
		else if ( $GLOBALS['store'] == 'region' ) // month subcategory region
		{
			
		}
		else // month subcategory only
		{

		}
	}
	else if ( $GLOBALS['product'] == 'category' ) // month category *
	{
		if ( $GLOBALS['store'] == 'name' ) // month category name
		{

		}
		else if ( $GLOBALS['store'] == 'county' ) // month category county
		{
			
		}
		else if ( $GLOBALS['store'] == 'state' ) // month category state
		{
			
		}
		else if ( $GLOBALS['store'] == 'region' ) // month category region
		{
			
		}
		else // month category only
		{

		}
	}
	else // category // month all *
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
			$rollup = "select t.fiscal_period, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.fiscal_period, p.category, s.sales_region;";

			$result = $conn->query($rollup);

			$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Fiscal Quarter</th>" .
			    	"<th>Category</th>" .
			    	"<th>Region</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["fiscal_period"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["sales_regiontore_state"] . "</td>" .
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
		}
	}
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
			$rollup = "select t.fiscal_period, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.fiscal_period, p.category, s.sales_region;";

			$result = $conn->query($rollup);

			$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Fiscal Quarter</th>" .
			    	"<th>Category</th>" .
			    	"<th>Region</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["fiscal_period"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["sales_regiontore_state"] . "</td>" .
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
		}
	}
}
else if ( $GLOBALS['time'] == 'fiscal' )
{
	$GLOBALS['time'] = 'year';
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
			$rollup = "select t.year, p.category, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.year, p.category, s.name;";

			$result = $conn->query($rollup);

			$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Year</th>" .
			    	"<th>Category</th>" .
			    	"<th>Name</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["year"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["name"] . "</td>" .
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
		}
		else if ( $GLOBALS['store'] == 'county' )
		{
			$rollup = "select t.year, p.category, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key group by t.year, p.category, s.store_county;";

			$result = $conn->query($rollup);

			$result_string;

			if ($result->num_rows > 0) 
			{
			    // output data of each row
			   echo "<table><tr>" .
			    	"<th>Year</th>" .
			    	"<th>Category</th>" .
			    	"<th>County</th>" .
			    	"<th>Units Sold</th>" .
			    	"<th>Total Customers</th>" .
			    	"<th>Revenue</th>" .
			    	"<th>Profit</th></tr>";
				while($row = $result->fetch_assoc()) 
			    {
			         echo "<tr>" . 
			         	"<td>". $row["year"] . "</td>" .
			         	"<td>". $row["category"] . "</td>" .
			         	"<td>". $row["store_county"] . "</td>" .
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
	}
	echo "Hello year";
}
else // group all dates
{
	
}



*/