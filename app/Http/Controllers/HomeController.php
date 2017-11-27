<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Evaluation;
use Validator;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('home');
    }

}
