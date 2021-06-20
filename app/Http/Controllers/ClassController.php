<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class ClassController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('class/class');
		
	}
	public function classAdd(Request $req)
	{
		$ccObj = new CommonController();
		$data['name'] = trim($req->class_name);
		$data['number'] = trim($req->class_number);
		//$data['teacher_id'] = $req->teacher_id;
		$data['teacher_id'] = session('id');
		$data['created_by'] = session('id');

		$value = $ccObj->checkThanaDuplicacy('classes', 'name', $data['name'],'teacher_id',$data['teacher_id']);

		$editId = $req->edit_id;

		if($editId == ""){
			if (count($value) > 0) {
				return response()->json(array("result" => "error", "message" => "This referral item already exist"));
			}else{
				// if($ccObj->checkUserAccess("Referral","Add") == "no_access"){

				// 	return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
				// }else{
				$result = DB::table('classes')->insert($data);
				if($result){
					return response()->json(array("result" => "success", "message" => "Data saved successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
				//}
			}
		}else{
			// if($ccObj->checkUserAccess("Referral","Edit") == "no_access"){

			// 	return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
			// }else{
			$data['updated_by'] = session('id');
			$result = DB::table('classes')->where('id', $editId)->update($data);
			if($result){
				return response()->json(array("result" => "success", "message" => "Data update successfully"));
			}else{
				return response()->json(array("result" => "error", "message" => "Something went weong"));
			}
			//}
		}

	}



	function ClassList(Request $request)
	{
		if ($request->ajax()) {
			$data = DB::table('classes')
			->select('classes.id','classes.name','classes.number','teachers.name as teacherName',)
			->leftJoin('teachers', 'teachers.id', '=', 'classes.teacher_id')
			->where('classes.activation_status', 'active')
			->get();

			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('action', function($row){
				$btn = '<i title="Delete" data-id="'.$row->id.'"  class="deleteData ti-close btn btn-outline-danger " data-target="#deleteModal" ></i> &emsp;';

				$btn = $btn.'<i title="Edit" data-id="'.$row->id.'" class=" editData icon-pencil btn btn-outline-info" data-target="#editModal" ></i>';
				return $btn;
			})
			->rawColumns(['action'])
			->make(true);
			return $data;
		}
	}


	public function getClassById($id)
	{
		$data = DB::table('classes')
		->select('classes.id','classes.name','classes.number','classes.teacher_id')
		->where('classes.id', $id)
		->where('classes.activation_status', 'active')
		->limit(1)
		->get();
		echo json_encode($data);

	}

	public function referralDeleteById(Request $req)
	{

		$ccObj = new CommonController(); 
		$tableName = 'classes';
		$columnName = 'id';
		$id = $req->id;
		if($ccObj->checkUserAccess("Referral","Delete") == "no_access"){

			return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
		}else{
			$result = $ccObj->dataDeletion($tableName,$columnName,$id);

			if($result > 0 ){
				return response()->json(array("result" => "success", "message" => "Data delete successfully"));
			}else{
				return response()->json(array("result" => "fail", "message" => "Something went weong"));
			}
		}
	}




}