<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Helper;
use Auth;

class MainController extends BaseController
{
    public function index()
    {
    	return view('sites.main.index');
    }
}
