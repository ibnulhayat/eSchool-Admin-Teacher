<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class Thana extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function addThana(Request $req){
		$ccObj = new CommonController();

		$data['name'] = trim($req->tha_name);
		$data['district_id'] = $req->district_id;
		$data['created_by'] = session('id');
		$editId = $req->edit_id;
		
		$value = $ccObj->checkThanaDuplicacy('upazilas_or_thanas', 'name', $data['name'],'district_id', $data['district_id']);
		//$value2 = $ccObj->checkDataDuplicacy('upazilas_or_thanas', 'district_id', $data['district_id']);
		
		// this dd use for show the result && count($value2) > 0
		// dd(count($value)); 
		if($editId == ""){

			if (count($value) > 0 ) {
				return response()->json(array("result" => "error", "message" => "This thana name already exist")); 
			}else{
				if($ccObj->checkUserAccess("Thana","Add") == "no_access"){

					return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
				}else{
					$result = DB::table('upazilas_or_thanas')->insert($data);

					if($result){
						return response()->json(array("result" => "success", "message" => "Data saved successfully"));
					}else{
						return response()->json(array("result" => "error", "message" => "Something went weong"));
					}
				}
			}
		}else{
			if($ccObj->checkUserAccess("Thana","Edit") == "no_access"){

				return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
			}else{
				$data['updated_by'] = session('id');
				$result = DB::table('upazilas_or_thanas')->where('id', $editId)->update($data);
				if($result){
					return response()->json(array("result" => "success", "message" => "Data update successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
			}
		}

	}



	function thanaListDataTable(Request $request)
	{
		if ($request->ajax()) {
			$data = DB::table('upazilas_or_thanas')
			->select('upazilas_or_thanas.id','upazilas_or_thanas.name','districts.name as district',)
			->leftJoin('districts', 'districts.id', '=', 'upazilas_or_thanas.district_id')
			->where('upazilas_or_thanas.activation_status', 'active')
			->orderBy('upazilas_or_thanas.name','asc')
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

	public function getThanaById($id)
	{
		$data = DB::table('upazilas_or_thanas')
		->select('upazilas_or_thanas.id','upazilas_or_thanas.name','upazilas_or_thanas.district_id')
		->where('upazilas_or_thanas.id', $id)
		->where('upazilas_or_thanas.activation_status', 'active')
		->limit(1)
		->get();
		echo json_encode($data);

	}

	public function thanaDeleteByID(Request $req)
	{
		$ccObj = new CommonController(); 
		$tableName = 'upazilas_or_thanas';
		$columnName = 'id';
		$id = $req->id;
		if($ccObj->checkUserAccess("Thana","Delete") == "no_access"){

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


	public function thana()
	{
		if(session('user_type') == "Guest"){
			return view('no_access');
		}else{
			return view('area/thana');
		}
	}
}