<?php

$constants = array(
	'INSERT' => 0,
	'UPDATE' => 1,
	'DELETE' => 9,
	'LIMIT_PAGE' => 2,
);


// Define constant
foreach ($constants as $key => $value) {
	if(!defined($key)){
		define($key, $value);
	}
}
