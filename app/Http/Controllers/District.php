<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class District extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}


	public function addDistrict(Request $req)
	{
		$ccObj = new CommonController();

		$data['name'] = trim($req->dis_name);
		$data['division_id'] = $req->division_id;
		$data['created_by'] = session('id');
		$editId = $req->edit_id;
		$value = $ccObj->checkDataDuplicacy('districts', 'name', $data['name']);
		
		// this dd use for show the result
		// dd(count($value)); 
		if($editId == ""){
			if (count($value) > 0) {
				return response()->json(array("result" => "error", "message" => "This district already exist"));
			}else{
				if($ccObj->checkUserAccess("District","Add") == "no_access"){

					return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
				}else{
					$result = DB::table('districts')->insert($data);

					if($result){
						return response()->json(array("result" => "success", "message" => "Data saved successfully"));
					}else{
						return response()->json(array("result" => "error", "message" => "Something went weong"));
					}
				}
			}
		}else{
			if($ccObj->checkUserAccess("District","Edit") == "no_access"){

				return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
			}else{
				$data['updated_by'] = session('id');
				$result = DB::table('districts')->where('id', $editId)->update($data);
				if($result){
					return response()->json(array("result" => "success", "message" => "Data update successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
			}
		}

	}

	function districtListDataTable(Request $request)
	{
		if ($request->ajax()) {
			$data = DB::table('districts')
			->select('districts.id','districts.name','divisions.name as division',)
			->leftJoin('divisions', 'divisions.id', '=', 'districts.division_id')
			->where('districts.activation_status', 'active')
			->orderBy('districts.name','asc')
			->get();

			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('action', function($row){
				$btn = '<i title="Delete" data-id="'.$row->id.'"  class="deleteData ti-close btn btn-outline-danger" data-target="#deleteModal" ></i> &emsp;';

				$btn = $btn.'<i title="Edit" data-id="'.$row->id.'"  class="editData icon-pencil btn btn-outline-info" data-target="#editModal" ></i>'; 
				return $btn;
			})
			->rawColumns(['action'])
			->make(true);
			return $data;
		} 
	}

	public function getDistrictById($id)
	{
		$data = DB::table('districts')
		->select('districts.id','districts.name','districts.division_id')
		->where('districts.id', $id)
		->where('districts.activation_status', 'active')
		->limit(1)
		->get();
		echo json_encode($data);

	}

	public function districtDeleteByID(Request $req)
	{

		$ccObj = new CommonController(); 
		$tableName = 'districts';
		$columnName = 'id';
		$id = $req->id;
		if($ccObj->checkUserAccess("District","Delete") == "no_access"){

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

	public function district()
	{
		if(session('user_type') == "Guest"){
			return view('no_access');
		}else{
			return view('area/district');
		}
	}
}