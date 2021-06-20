<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Downloadreport extends Controller
{

	protected  $gender = ["Male","Female"];
	protected  $agerange = ["10-14","15-19","20-999"];
	// info table 
	protected  $callAnalysis = ["Number of Calls"];
	protected  $maritalStatus = ["Unmarried","Married","Not Asked","Refused to answer"];
	protected  $callerType = ["Yes","No","Not Asked","Refused to answer"];
	protected  $aboutHelpline = ["Radio Program","School","Madrasa","Club member","Gender promoter","Newspaper","GB project event","Friend","Project staff","Parents","Website","Not Asked","Refused to answer"];

	// service table 
	protected  $issues = ["SRH","FP","GBV","MH","Other","GPH"];
	protected  $callDuration = ["0-5 minutes","6-10 minutes","11-15 minutes","16-20 minutes","21-25 minutes","26-30 minutes","Above 30 minutes"];
	protected  $serviceRating = ["Satisfactory","Moderately satisfactory","Not satisfactory","Confusing","Not Asked"];
	protected  $callType = ["information-call","complete/dealing","incomplete","hang_up","prank"];
	
	function callAnalysis($name = null)
	{
		$date =  explode("=", $name)[0];
		$category =  explode("=", $name)[1];
		$array = array();

		if($category == "marital" ){
			$array = $this->createList("info","marital_status",$this->maritalStatus,$date);
		}else if($category == "callertype" ){
			$array = $this->createList("info","call_before",$this->callerType,$date);
		}else if($category == "helpline" ){
			$array = $this->createList("info","source_of_knowing",$this->aboutHelpline,$date);
		}else if($category == "issues" ){
			$array = $this->createList("service","issue_of_counseling",$this->issues,$date);
		}else if($category == "reffered" ){
			$array = $this->createList("service","services_of_refferral",$this->issues,$date);
		}else if($category == "duration" ){
			$array = $this->createList("service","call_duration",$this->callDuration,$date);
		}else if($category == "rating" ){
			$array = $this->createList("service","caller_feeling",$this->serviceRating,$date);
		}else if($category == "calltype" ){
			$array = $this->createList("service","call_type",$this->callType,$date);
		}else if($category == "district" ){
			$array = $this->createList("info","district_id","",$date);
		}else if($category == "first" ){
			$array = $this->createList("info","",$this->callAnalysis,$date);
		}
		echo json_encode($array);
		
	}

	function createList($tableName,$columnName,$titleList,$date)
	{
		$data = array();

		if($titleList == ""){
			$districtList = DB::table('districts')->select('id', 'name')->orderby('name','asc')->get();
			foreach($districtList as $district) {
				$count = array();
				foreach($this->agerange as $age) {
					if($age == $this->agerange[2]){
						array_push($count,($count[0]+$count[2]));
						array_push($count,($count[1]+$count[3]));
					}
					foreach ($this->gender as $gender) {
						array_push($count,$this->getCount($tableName,$columnName,$district->id,$age,$gender,$date));
					}
				}
				if(count($count)>5){
					array_push($count,($count[4]+$count[6]));
					array_push($count,($count[5]+$count[7]));
					array_push($count,($count[8]+$count[9]));
				}
				$data[] = array(
					'title' => $district->name,
					'count'   => $count
				);
			}

		}else{
			foreach($titleList as $title) {
				$count = array();
				foreach($this->agerange as $age) {
					if($age == $this->agerange[2]){
						array_push($count,($count[0]+$count[2]));
						array_push($count,($count[1]+$count[3]));
					}
					foreach ($this->gender as $gender) {
						array_push($count,$this->getCount($tableName,$columnName,$title,$age,$gender,$date));
					}
				}
				if(count($count)>5){
					array_push($count,($count[4]+$count[6]));
					array_push($count,($count[5]+$count[7]));
					array_push($count,($count[8]+$count[9]));
				}
				$data[] = array(
					'title' => $title,
					'count'   => $count
				);
			}
		}
		return $data;

	}

	function getCount($tableName,$columnName,$value,$ageRange,$gender,$date)
	{
		$from =  explode("-", $ageRange)[0];
		$to =  explode("-", $ageRange)[1];
		$split = explode('&', $date);

		$countValue;

		if($columnName == ""){
			$countValue = DB::table('caller_'.$tableName)
			->where('gender', $gender)
			->whereBetween('age', array($from, $to))
			->where('created_at',">=",$split[0])
			->where('created_at',"<=",$split[1])
			->where('activation_status', 'active')
			->count();
		}else if($tableName == "info"){
			$countValue = DB::table('caller_info')
			->where($columnName, $value)
			->where('gender', $gender)
			->whereBetween('age', array($from, $to))
			->where('created_at',">=",$split[0])
			->where('created_at',"<=",$split[1])
			->where('activation_status', 'active')
			->count();
		}else if($tableName == "service"){
			$countValue = DB::table('caller_info')
			->select('caller_info.unique_id') 
			->where('caller_info.gender', $gender)
			->whereBetween('caller_info.age', array($from, $to))
			->leftJoin('caller_service', 'caller_service.unique_id', '=', 'caller_info.unique_id')
			->where('caller_service.'.$columnName, $value)
			->where('caller_service.created_at',">=",$split[0])
			->where('caller_service.created_at',"<=",$split[1])
			->where('caller_info.activation_status','active')
			->where('caller_service.activation_status', 'active')
			->count();
		}
		return $countValue;

	}


	function getMonthYear()
	{
		$startDate = DB::table('caller_service')
		->select('created_at')
		->first();
		$lastDate = DB::table('caller_service')
		->select('created_at')
		->orderBy('id', 'DESC')
		->first();

		$date = [];
		$period = CarbonPeriod::create($startDate->created_at, '1 month', $lastDate->created_at);

		foreach ($period as $dt) {
			array_push($date, [
				'value' => $dt->format("Y-m"), 
				'date' => $dt->format("F Y")
			]);
		}


		echo json_encode($date);
	}

	function FunctionName()
	{
		$districtList = DB::table('districts')
		->select('districts.id', 'name','divisions.name ad division')
		->leftJoin()
		->orderby('districts.name','asc')
		->get();
		
		foreach($this->districtList as $title) {
			echo $title->id." -> ";
		}
	}
}