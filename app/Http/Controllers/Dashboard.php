<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Dashboard extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	
	public function dashboardView()
	{
		return view('dashboard');
	}


}
