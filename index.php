<!DOCTYPE HTML
	<html>
		<head>
			<title>Grocery Database</title>
			<link rel="stylesheet" type="text/css" href="db.css"/>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script>
				$(document).ready(function()
				{
					$('#rollup').click(function()
					{
						//$( '#tablearea' ).html("Rolled");
						$( "#rollup_options" ).toggle();
						$( "#drilldown_options" ).hide();
					});

					$('#drilldown').click(function()
					{
						$( "#tablearea" ).html("");
						$( "#drilldown_options" ).toggle();
						$( "#rollup_options" ).hide();
					});

					$('#basecube').click(function()
					{
						$("#tablearea").html("<?php include_once('basecube.php'); ?> ");
					});

					$('#slice').click(function()
					{
						$( "#tablearea" ).html("");
					});

					$('#dice').click(function()
					{
						$( "#tablearea" ).html("");
					});

					$('#rollup_time').click(function()
					{
						//$( "#tablearea" ).html("");
						$("#tablearea").html("<?php include('rollup_time.php')  ?> ");
					});			

					$('#rollup_store').click(function()
					{
						//$("#tablearea").html("<?php /*include('rollup_store.php'); */?> ");
					});	
				});
			</script>
		</head>
		<body>
			<div class="main">
				<div id="testing"></div>
				<div id="buttons">
					<div id="rollup" class="control">
						<span class="two">ROLL UP</span>
					</div>
					<div id="drilldown" class="control">
						<span class="four">DRILL DOWN</span>
					</div>
					<div id="basecube" class="control">
						<span class="three">BASE CUBE</span>
					</div>
					<div id="slice" class="control">
						<span class="one">SLICE</span>
					</div>
					<div id="dice" class="control">
						<span class="one">DICE</span>
					</div>
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
					<!-- <?php include_once('testselectall.php'); ?> -->
					Nothing here
				</div>
			</div> <!-- end main -->
		</body>
	</html>