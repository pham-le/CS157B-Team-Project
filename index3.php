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
					
					
					<div>Dimensions
						<table width="100%">
							<tr>
								<th><input type="checkbox" name="dim" value="1"/>Product</th>
								<th><input type="checkbox" name="dim" value="2"/>Store</th>
								<th><input type="checkbox" name="dim" value="3"/>Time</th>
								<th><input type="checkbox" name="dim" value="4"/>Promotion</th>
							</tr>
							<tr>
								<td><span style="text-align:left">
								<input type="checkbox" name="product" value="1"/>product_key<br/>
								<input type="checkbox" name="product" value="2"/>description<br/>
								<input type="checkbox" name="product" value="3"/>full_description<br/>
								<input type="checkbox" name="product" value="4"/>SKU_number<br/>
								<input type="checkbox" name="product" value="5"/>package_size<br/>
								<input type="checkbox" name="product" value="6"/>brand<br/>
								<input type="checkbox" name="product" value="7"/>subcategory<br/>
								<input type="checkbox" name="product" value="8"/>category<br/>
								<input type="checkbox" name="product" value="9"/>department<br/>
								<input type="checkbox" name="product" value="10"/>package_type<br/>
								<input type="checkbox" name="product" value="11"/>diet_type<br/>
								<input type="checkbox" name="product" value="12"/>weight<br/>
								<input type="checkbox" name="product" value="13"/>weight_unit_of_measure<br/>
								<input type="checkbox" name="product" value="14"/>units_per_retail_case<br/>
								<input type="checkbox" name="product" value="15"/>units_per_shipping_case<br/>
								<input type="checkbox" name="product" value="16"/>cases_per_pallet<br/>
								<input type="checkbox" name="product" value="17"/>shelf_width_cm<br/>
								<input type="checkbox" name="product" value="18"/>shelf_height_cm<br/>
								<input type="checkbox" name="product" value="19"/>shelf_depth_cm</span>
								</td>
								<td>
								<input type="checkbox" name="store" value="1"/>store_key<br/>
								<input type="checkbox" name="store" value="2"/>name<br/>
								<input type="checkbox" name="store" value="3"/>store_number<br/>
								<input type="checkbox" name="store" value="4"/>store_street_address<br/>
								<input type="checkbox" name="store" value="5"/>city<br/>
								<input type="checkbox" name="store" value="6"/>store_county<br/>
								<input type="checkbox" name="store" value="7"/>store_state<br/>
								<input type="checkbox" name="store" value="8"/>store_zip<br/>
								<input type="checkbox" name="store" value="9"/>sales_district<br/>
								<input type="checkbox" name="store" value="10"/>sales_region<br/>
								<input type="checkbox" name="store" value="11"/>store_manager<br/>
								<input type="checkbox" name="store" value="12"/>store_phone<br/>
								<input type="checkbox" name="store" value="13"/>store_FAX<br/>
								<input type="checkbox" name="store" value="14"/>floor_plan_type<br/>
								<input type="checkbox" name="store" value="15"/>photo_processing_type<br/>
								<input type="checkbox" name="store" value="16"/>finance_services_type<br/>
								<input type="checkbox" name="store" value="17"/>first_opened_date<br/>
								<input type="checkbox" name="store" value="18"/>last_remodel_date<br/>
								<input type="checkbox" name="store" value="19"/>store_sqft<br/>
								<input type="checkbox" name="store" value="20"/>grocery_sqft<br/>
								<input type="checkbox" name="store" value="21"/>frozen_sqft<br/>
								<input type="checkbox" name="store" value="22"/>meat_sqft
								</td>
								<td>
								<input type="checkbox" name="time" value="1"/>time_key<br/>
								<input type="checkbox" name="time" value="2"/>date<br/>
								<input type="checkbox" name="time" value="3"/>day_of_week<br/>
								<input type="checkbox" name="time" value="4"/>day_number_in_month<br/>
								<input type="checkbox" name="time" value="5"/>day_number_overall<br/>
								<input type="checkbox" name="time" value="6"/>week_number_in_year<br/>
								<input type="checkbox" name="time" value="7"/>week_number_overall<br/>
								<input type="checkbox" name="time" value="8"/>Month<br/>
								<input type="checkbox" name="time" value="9"/>quarter<br/>
								<input type="checkbox" name="time" value="10"/>fiscal_period<br/>
								<input type="checkbox" name="time" value="11"/>year<br/>
								<input type="checkbox" name="time" value="12"/>holiday_flag
								</td>
								<td>
								<input type="checkbox" name="promotion" value="1"/>promotion_key<br/>
								<input type="checkbox" name="promotion" value="1"/>promotion_name<br/>
								<input type="checkbox" name="promotion" value="1"/>price_reduction_type<br/>
								<input type="checkbox" name="promotion" value="1"/>ad_type<br/>
								<input type="checkbox" name="promotion" value="1"/>display_type<br/>
								<input type="checkbox" name="promotion" value="1"/>coupon_type<br/>
								<input type="checkbox" name="promotion" value="1"/>ad_media_type<br/>
								<input type="checkbox" name="promotion" value="1"/>display_provider<br/>
								<input type="checkbox" name="promotion" value="1"/>promo_cost<br/>
								<input type="checkbox" name="promotion" value="1"/>promo_begin_date<br/>
								<input type="checkbox" name="promotion" value="1"/>promo_end_date
								</td><br/>
							</tr>
						</table>
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
									<span style="font-size: 12px; color: grey">(e.g. s.store_state = 'AZ')</span>
								</span>
							<br/>
							<div id="dice"class="control">Dice</div>
								<span id="dice_options">
									<input type="text" id="d1" name="dice1" placeholder="CONDITION 1"> AND 
									<input type="text" id="d2" name="dice2" placeholder="CONDITION 2">
									<span style="font-size: 12px; color: grey">(e.g. s.store_state = 'AZ' AND p.category = 'drinks')</span>
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
							
							//slice & dice
										$filter;
										if ($_POST['slice'] != "")
											$filter = 'AND '.$_POST['slice'];
										else if($_POST['dice1'] != "" && $_POST['dice2'] != "")
											$filter = 'AND '.$_POST['dice1'].' AND '.$_POST['dice2'];
										else
											$filter = '';

							//echo $time . " " . $product . " " . $store;

							if($time == 'none')
							{
								if($product == 'none')
								{
									if($store == 'none')
									{
										
										$query = "select sum(sf.unit_sales) total_unit_sold, sum(customer_count) customer_count, sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit from sales_fact sf, Product p, Store s, Time t, Promotion pr where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key ".$filter.";";
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