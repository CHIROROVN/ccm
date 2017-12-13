<?php
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

if (!function_exists('curr_page')) {

    function curr_page()
    {
    	$name_page = \Request::route()->getName();
    	$arr_page = explode('.', $name_page);
    	return $arr_page[1];
    }
}
