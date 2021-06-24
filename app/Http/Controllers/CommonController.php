<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommonController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	// public function dataDeletion($tableName, $id)
	// {
	// 	$result = DB::select(DB::raw("SHOW KEYS FROM {$tableName} WHERE Key_name = 'PRIMARY'"));
	// 	$pkColumn = $result[0]->Column_name; 

	// 	try{
	// 		$result = DB::table($tableName)
	// 		->where($pkColumn,$id)
	// 		->delete();
	// 		if($result){
	// 			return response()->json(array("result" => "success", "message" => "Data deleted completely"));
	// 		}else{
	// 			return response()->json(array("result" => "fail", "message" => "Something went wrong"));
	// 		}
	// 	}catch (\Illuminate\Database\QueryException $e) {
	// 		$errorCode = $e->errorInfo[1];
	// 		if($errorCode == 1451){
	// 			$update_data['activation_status'] = 'inactive';
	// 			$result2 = DB::table($tableName)
	// 			->where($pkColumn, $id)
	// 			->limit(1)  
	// 			->update($update_data); 

	// 			if($result2){
	// 				return response()->json(array("result" => "success", "message" => "Data deleted successfully"));
	// 			}else{
	// 				return response()->json(array("result" => "fail", "message" => "Something went wrong"));
	// 			}
	// 		}
	// 	}
	// }

	public function get_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return substr($string, $ini, $len);
	}

	public function checkUserAccess($page_name,$module_name)
	{
		$user_id =  session('id');
		$data = DB::table('page_users')
		->select('allow_deny')
		->where('page_name', $page_name)
		->where('module_name', $module_name)
		->where('user_id', $user_id)
		->where('allow_deny', 'allow')
		->get();

		if(count($data) == 0){
			return "no_access";
		}
	}
	public function checkPageAccess($userType)
	{
		$user_id =  session('id');
		$data = DB::table('users')
		->select('group_list.name as user_type')
		->where('id_user', $user_id)
		->leftJoin('group_list','group_list.id','=','users.user_type')
		->where('id_user', $user_id)
		->where('activation_status', 'active')
		->get();

		if(count($data) == 0){
			return "no_access";
		}
	}

	public function getMicroTime()
	{
		return microtime(true);
	}

	public function getTimeDifference($startTime, $endTime)
	{
		return $endTime - $startTime;
	}

	public function getDataById($tableName, $id)
	{
		if($tableName != "users"){
			$result = DB::select(DB::raw("SHOW KEYS FROM {$tableName} WHERE Key_name = 'PRIMARY'"));
			$primaryKey = $result[0]->Column_name; 

			$data = DB::table($tableName)->select('*')->where($primaryKey, $id)->limit(1)->get();
			return response()->json($data);
		}
	}

	public function dataDeletion($tableName, $columnName, $id)
	{
		$update_data['activation_status'] = 'inactive';
		
		$data = DB::table($tableName)
		->where($columnName, $id)
		->limit(1)  
		->update($update_data); 
		return $data;
	}

	public function checkDataDuplicacy($tableName, $columnName, $compareValue)
	{
		$data = DB::table($tableName)
		->select($columnName)
		->where($columnName, $compareValue)
		->where('activation_status', '!=', 'inactive')
		->limit(1)
		->get();
		return $data;
	}
	
	function checkDuplicacyTwoColumn($tableName, $column1, $compare1,$column2, $compare2)
	{
		$dt = Carbon::now();
		$data = DB::table($tableName)
		->select('id')
		->where($column1, $compare1)
		->where($column2, $compare2)
		->where('created_at', $dt->format("Y-m-d"))
		->limit(1)
		->get();
		return $data;
	}

	public function checkDataDuplicacyOnEdit($tableName, $columnName, $compareValue, $idColumnName, $id)
	{
		$data = DB::table($tableName)
		->select($columnName)
		->where($columnName, $compareValue)
		->where($idColumnName,$id)
		->where('activation_status', '!=', 'deactive')
		->limit(1)
		->get();
		return $data;
	}



	public function fileExtensionsAllowed($file_extension)
	{
		$allowed_or_not = "";
		$allowed_extensions = array('bmp','jpg','jpeg','png','pdf','doc','docx','xls','xlsx','txt');
		if (in_array($file_extension, $allowed_extensions)) 
		{ 
			$allowed_or_not = "allowed"; 
		} 
		else
		{ 
			$allowed_or_not = "not_allowed"; 
		}
		return $allowed_or_not;
	}

	public function getDistrictList()
	{
		$data = DB::table('districts')
		->select('id', 'name')
		->orderby('name','asc')
		->get();
		echo json_encode($data);
	}

	public function getThanaList($id)
	{
		$data = DB::table('upazilas_or_thanas')
		->select('id', 'name')
		->where('district_id', $id)
		->orderby('name','asc')
		->get();
		echo json_encode($data);
	}
	public function getClassList()
	{
		$data = DB::table('classes')
		->select('id','name','number')		
		->orderby('number','asc')
		->where('activation_status', 'active')
		->get();
		echo json_encode($data);
	}
	public function getGroupList()
	{
		$data = DB::table('group_list')
		->select('id', 'name')
		->where('activation_status','active')
		->orderby('name','asc')
		->get();
		echo json_encode($data);
	}
	public function getReferralList()
	{
		$data = DB::table('referrals')
		->select('id', 'name','address')
		->orderby('name','asc')
		->get();
		echo json_encode($data);
	}

}
