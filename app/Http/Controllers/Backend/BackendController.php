<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function __construct(){

        //$this->middleware('auth', ['except' => ['postLogin', 'login','logout']]);
    }

}