<?php

echo $GLOBALS['time'];
/*
if ( $GLOBALS['time'] == 'date' )
{
	$GLOBALS['time'] = 'month' 
}
else if ( $GLOBALS['time'] == 'month' )
{
	$GLOBALS['time'] = 'fiscal'
}
else if ( $GLOBALS['time'] == 'fiscal' )
{
	$GLOBALS['time'] = 'year';
}
else // group all dates
{
	
}*/

include_once('rollup_time.php');