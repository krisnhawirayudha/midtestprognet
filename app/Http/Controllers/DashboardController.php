<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = array('title' => 'Dashboard');
        return view ('dashboard.index',$data);
    }
}
