<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends CabinetController
{
    public function index()
    {
    	return view('cabinet.main.index');
    }
}
