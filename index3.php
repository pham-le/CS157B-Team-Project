<!DOCTYPE HTML
	<html>
		<head>
			<title>Grocery Database</title>
			<link rel="stylesheet" type="text/css" href="db.css"/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			
			<script>
				$(document).ready(function()
				{

					$('#basecube').click(function()
					{
						$("#tablearea").html("<?php include_once('basecube.php'); ?> ");
					});
					
					$('#slice').click(function()
					{
						$( "#slice_options" ).toggle();
						$( "#dice_options" ).hide();
						$( "#s" ).val("");
						$( "#d1" ).val("");
						$( "#d2" ).val("");
					});

					$('#dice').click(function()
					{
						$( "#dice_options" ).toggle();
						$( "#slice_options" ).hide();
						$( "#s" ).val("");
						$( "#d1" ).val("");
						$( "#d2" ).val("");
					});

				});
			</script>
		</head>
		<body>
			<div class="main">
				<div id="testing"></div>
				<div id="buttons">
					
					<div id="basecube" class="control">
						<span class="three">BASE CUBE</span>
					</div>
					<hr/>
					<div>
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
							<label for="time_info">Time</label>
							<select name="time_info" id="time_info" class="dropdown"> 
							  <option value="none" >All </option>
							  <option value="date" >Date</option>
							  <option value="month" >Month</option>
							  <option value="fiscal" >Fiscal Quarter</option>
							  <option value="year" >Year</option>
							</select>
							<label for="product_info">Product</label>
							<select name="product_info" id="product_info" class="dropdown"> 
							  <option value="none" >All </option>
							  <option value="description" >Product Name</option>
							  <option value="department" >Department</option>
							  <option value="subcategory" >Subcategory</option>
							  <option value="category" >Category</option>
							</select>
							<label for="store_info">Store</label>
							<select name="store_info" id="store_info" class="dropdown"> 
							 <option value="none" >All </option>
							  <option value="name" >Store Name</option>
							  <option value="county" >County</option>
							  <option value="state" >State</option>
							  <option value="region" >Region</option>
							</select>
							
							
							<br/>
							<div id="slice"class="control">Slice</div>
								<span id="slice_options">
									<input type="text" id="s" name="slice" placeholder="CONDITION"/>
								</span>
							<br/>
							<div id="dice"class="control">Dice</div>
								<span id="dice_options">
									<input type="text" id="d1" name="dice1" placeholder="CONDITION 1"> AND 
									<input type="text" id="d2" name="dice2" placeholder="CONDITION 2">
								</span>
							
							<br/>
							<input type="submit" value="Submit">
						</form>
				</div>
				<div id="options">
					<div id="rollup_options" class="">
						<div id="rollup_time" class="optionbutton">
							<span class="time_text">on time</span>
						</div>
						<div id="rollup_product" class="optionbutton">
							<span class="product_text">on product</span>
						</div>
						<div id="rollup_store" class="optionbutton">
							<span class="store_text">on store</span>
						</div>
					</div>
					<div id="drilldown_options">
						<div id="drilldown_time" class="optionbutton">
							<span class="time_text">on time</span>
						</div>
						<div id="drilldown_product" class="optionbutton">
							<span class="product_text">on product</span>
						</div>
						<div id="drilldown_store" class="optionbutton">
							<span class="store_text">on store</span>
						</div>
					</div>
					<div id="slice_options">
						<div id="slice_time" class="optionbutton">
							<span class="time_text">on time</span>
						</div>
						<div id="slice_product" class="optionbutton">
							<span class="product_text">on product</span>
						</div>
						<div id="slice_store" class="optionbutton">
							<span class="store_text">on store</span>
						</div>
					</div>
					<div id="dice_options">
						<div id="dice_time" class="optionbutton">
							<span class="time_text">on time</span>
						</div>
						<div id="dice_product" class="optionbutton">
							<span class="product_text">on product</span>
						</div>
						<div id="dice_store" class="optionbutton">
							<span class="store_text">on store</span>
						</div>
					</div>
				</div>
				<hr/>
				<p>
					Look things are things. 
				</p>
				<div id="tablearea">
					<?php
						if(!empty($_POST))
						{
							//echo "THINGS. HAPPENED.";
							//var_dump($_POST);

							$time = $_POST['time_info'];
							$product = $_POST['product_info'];
							$store = $_POST['store_info'];

							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "grocery";

							//echo "Test <br/><br/>";

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);

							// Check connection
							if ($conn->connect_error) 
							{
								echo "Nope";
							    die("Connection failed: " . $conn->connect_error);
							} 
							//else echo "Success connecting.";

							$query;

							//echo $time . " " . $product . " " . $store;

							if($time == 'none')
							{
								if($product == 'none')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
										
										$query = "select sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["sales_region"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'all')
									{
										
									}
								}
								else if($product == 'description')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.description, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.description;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Item</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.description, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.description, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Item</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.description, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.description, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Item</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.description, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.description, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Item</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["description"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.description, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.description, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Item</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'department')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.department, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.department;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Department</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.department, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.department, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Department</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.department, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.department, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Department</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.department, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.department, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Department</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["department"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.department, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.department, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Department</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'subcategory')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.subcategory, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.subcategory;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Subcategory</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.subcategory, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.subcategory, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.subcategory, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.subcategory, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Subcategory</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.subcategory, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.subcategory, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Subcategory</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["subcategory"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.subcategory, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.subcategory, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'category')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.category, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.category;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										    	"<th>Category</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.category, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.category, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Category</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.category, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.category, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Category</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.category, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Category</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by p.category, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Category</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
							}
							else if($time == 'date')
							{
								if($product == 'none')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
										
										$query = "select t.date, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date;";
										echo $query;
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'all')
									{
										
									}
								}
								else if($product == 'description')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.description, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.description;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Item</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.description, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.description, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Item</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.description, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.description, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Item</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.description, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.description, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Item</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.description, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.description, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Item</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'department')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.department, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.department;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Department</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.department, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.department, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Department</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.department, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.department, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Department</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.department, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.department, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Department</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.department, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.department, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Department</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'subcategory')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.subcategory, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.subcategory;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Subcategory</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.subcategory, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.subcategory, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.subcategory, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.subcategory, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.subcategory, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.subcategory, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.subcategory, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.subcategory, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'category')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.category, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.category;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										    	"<th>Category</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.category, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.category, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Category</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.category, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.category, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Category</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.category, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Category</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.date, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.date, p.category, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Date</th>" .
										   		"<th>Category</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". explode(" ", $row["date"])[0] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
							}
							else if($time == 'month')
							{
								if($product == 'none')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'all')
									{
										
									}
								}
								else if($product == 'description')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.description, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.description;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Item</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.description, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.description, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Item</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.description, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.description, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Item</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.description, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.description, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Item</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.description, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.description, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Item</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'department')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.department, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.department;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Department</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.department, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.department, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Department</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.department, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.department, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Department</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.department, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.department, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Department</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.department, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.department, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Department</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'subcategory')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.subcategory, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.subcategory;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Subcategory</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.subcategory, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.subcategory, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.subcategory, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.subcategory, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.subcategory, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.subcategory, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.subcategory, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.subcategory, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'category')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.category, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.category;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										    	"<th>Category</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.category, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.category, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Category</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.category, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.category, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Category</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.category, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
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
										         echo "<tr>" . 
										         	"<td>". $row["month"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.month, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.month, p.category, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Month</th>" .
										   		"<th>Category</th>" .
										    	"<th>Region</th>" .
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
										}
									}
									
								}
							}
							else if($time == 'fiscal')
							{
								if($product == 'none')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'all')
									{
										
									}
								}
								else if($product == 'description')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.description, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.description;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Item</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.description, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.description, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Item</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.description, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.description, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Item</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.description, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.description, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Item</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.description, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.description, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Item</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'department')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.department, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.department;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Department</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.department, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.department, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Department</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.department, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.department, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Department</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.department, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.department, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Department</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.department, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.department, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Department</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'subcategory')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.subcategory, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.subcategory;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Subcategory</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.subcategory, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.subcategory, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.subcategory, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.subcategory, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.subcategory, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.subcategory, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.subcategory, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.subcategory, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'category')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.category, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.category;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										    	"<th>Category</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.category, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.category, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Category</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.category, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.category, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Fiscal Quarter</th>" .
										   		"<th>Category</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["fiscal_period"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.category, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.fiscal_period, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.fiscal_period, p.category, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
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
										         	"<td>". $row["sales_region"] . "</td>" .
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
							}
							else if($time == 'year')
							{
								if($product == 'none')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year;";
										$result = $conn->query($query);
										//var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'all')
									{
										
									}
								}
								else if($product == 'description')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.description, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.description;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Item</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.description, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.description, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Item</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.description, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.description, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Item</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.description, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.description, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Item</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.description, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.description, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Item</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["description"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'department')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.department, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.department;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Department</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.department, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.department, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Department</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.department, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.department, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Department</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.department, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.department, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Department</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.department, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.department, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Department</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["department"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'subcategory')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.subcategory, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.subcategory;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Subcategory</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.subcategory, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.subcategory, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Store Name</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["name"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.subcategory, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.subcategory, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>County</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["store_county"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.subcategory, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.subcategory, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>State</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.subcategory, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.subcategory, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Subcategory</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["subcategory"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
								else if($product == 'category')
								{
									if($store == 'none')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.category, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.category;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										    	"<th>Category</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["total_unit_sold"] . "</td>" .
										         	"<td>". $row["customer_count"] . "</td>" .
										         	"<td>". $row["revenue"] . "</td>" .
										         	"<td>". $row["profit"] . "</td>" .
										         	"</tr>";
										    }
										    echo "</table>";
										}
									}
									else if($store == 'name')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.category, s.name, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.category, s.name;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Category</th>" .
										    	"<th>Store Name</th>" .
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
										}
									}
									else if($store == 'county')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.category, s.store_county, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.category, s.store_county;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
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
										}
									}
									else if($store == 'state')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.category, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.category, s.store_state;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
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
									else if($store == 'region')
									{
										//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';
											
										$query = "select t.year, p.category, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter." group by t.year, p.category, s.sales_region;";
										$result = $conn->query($query);
										var_dump($result);

										if ($result->num_rows > 0) 
										{
										   echo "<table><tr>" .
										   		"<th>Year</th>" .
										   		"<th>Category</th>" .
										    	"<th>Region</th>" .
										    	"<th>Units Sold</th>" .
										    	"<th>Total Customers</th>" .
										    	"<th>Revenue</th>" .
										    	"<th>Profit</th></tr>";
											while($row = $result->fetch_assoc()) 
										    {
										         echo "<tr>" . 
										         	"<td>". $row["year"] . "</td>" .
										         	"<td>". $row["category"] . "</td>" .
										         	"<td>". $row["sales_region"] . "</td>" .
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
							}
							
							
						}
					?>
					
				</div>
			</div> <!-- end main -->
		</body>

	</html>