<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function index()
	{
		return view('pages.welcome');
	}

	public function home()
	{
		return view('pages.home');
	}
}
