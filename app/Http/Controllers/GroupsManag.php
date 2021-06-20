<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;

class GroupsManag extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	public function addGroup(Request $req)
	{
		$ccObj = new CommonController();

		$data['name'] = trim($req->group_name);
		$data['created_by'] = session('id');
		$editId = $req->edit_id;
		$value = $ccObj->checkDataDuplicacy('group_list', 'name', $data['name']);
		
		// this dd use for show the result
		// dd(count($value)); 
		if($editId == ""){
			if (count($value) > 0) {
				return response()->json(array("result" => "error", "message" => "This group name already exist"));
			}else{
				$result = DB::table('group_list')->insert($data);

				if($result){
					return response()->json(array("result" => "success", "message" => "Data saved successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
			}
		}else{
			$data['updated_by'] = session('id');
			$result = DB::table('group_list')->where('id', $editId)->update($data);
			if($result){
				return response()->json(array("result" => "success", "message" => "Data update successfully"));
			}else{
				return response()->json(array("result" => "error", "message" => "Something went weong"));
			}
		}

	}


	public function groupDataList(Request $req)
	{

		if($req->ajax()){
			$data = DB::table('group_list')
			->select('id','name','created_at') 
			->where('activation_status','active')
			->get();

			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('date',function ($row)
			{
				$to = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at);
				$from = Carbon::now();
				$date = $to->diffForHumans($from);
				return $date;  
			})
			->addColumn('num_of_users',function ($row)
			{
				$count = DB::table('users')
				->where('user_type',$row->id)
				->count();
				return $count;  
			})
			->addColumn('action', function($row){
				$btn = '<i title="Delete" data-id="'.$row->id.'"  class="deleteData ti-close btn btn-outline-danger" data-target="#deleteModal" ></i> &emsp;';

				$btn = $btn.'<i title="Edit" data-id="'.$row->id.'"  class="editData icon-pencil btn btn-outline-info" data-target="#editModal" ></i>'; 
				return $btn;
			})
			->rawColumns(['action','date','num_of_users'])
			->make(true);
			return $data;

		}

	}

	public function getGroupById($id)
	{
		$data = DB::table('group_list')
		->select('group_list.id','group_list.name')
		->where('group_list.id', $id)
		->where('group_list.activation_status', 'active')
		->limit(1)
		->get();
		echo json_encode($data);

	}

	public function getdate($dt_old)
	{
		$dt = Carbon::now();
		// $dt_old = '2019-10-24 12:21:19';
		$years = $dt->diffInYears($dt_old);
		$dt = $dt->subYears($years);
		$months = $dt->diffInMonths($dt_old);
		$dt = $dt->subMonths($months);
		$days = $dt->diffInDays($dt_old);
		$dt = $dt->subDays($days);
		$hours = $dt->diffInHours($dt_old);
		$dt = $dt->subHours($hours);
		$minutes = $dt->diffInMinutes($dt_old);
		$dt = $dt->subMinutes($minutes);
		$seconds = $dt->diffInSeconds($dt_old);

		$value ="";
		if($years > 1){
			$value = $years.' years ago';
		}else{
			if($years == 1 ){
				$value = $years.' year ago';
			}
		}
		return (string)$value;
	}


	public function groupDeleteByID(Request $req)
	{

		$ccObj = new CommonController(); 
		$tableName = 'group_list';
		$columnName = 'id';
		$id = $req->id;

		$result = $ccObj->dataDeletion($tableName,$columnName,$id);

		if($result > 0 ){
			return response()->json(array("result" => "success", "message" => "Data delete successfully"));
		}else{
			return response()->json(array("result" => "error", "message" => "Something went weong"));
		}
	}

	public function groupsManag()
	{
		if(session('user_type') == "Guest"){
			return view('no_access');
		}else{
			return view('administration/groups_manag');
		}
	}
}