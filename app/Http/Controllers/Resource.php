<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class Resource extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}


	public function addNewResource(Request $req)
	{
		$ccObj = new CommonController();

		$data['title'] = trim($req->title);
		$data['category_id'] = $req->category_id;
		$data['keywords'] = $req->keyword;
		$data['description'] = $req->description;
		$data['created_by'] = session('id');
		$editId = $req->edit_id;
		$value = $ccObj->checkDataDuplicacy('resource', 'title', $data['title']);
		
		// this dd use for show the result
		// dd(count($value)); 
		if($editId == ""){
			if (count($value) > 0) {
				return response()->json(array("result" => "error", "message" => "This resource title already exist"));
			}else{ 
				if($ccObj->checkUserAccess("Resource","Add") == "no_access"){

					return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
				}else{
					$result = DB::table('resource')->insert($data);

					if($result){
						return response()->json(array("result" => "success", "message" => "Data saved successfully"));
					}else{
						return response()->json(array("result" => "error", "message" => "Something went weong"));
					}
				}
			}
		}else{
			if($ccObj->checkUserAccess("Resource","Edit") == "no_access"){

				return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
			}else{
				$data['updated_by'] = session('id');
				$result = DB::table('resource')->where('id', $editId)->update($data);
				if($result){
					return response()->json(array("result" => "success", "message" => "Data update successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
			}
		}

	}

	function resourceDataTable($id = null)
	{

		$query = DB::table('resource')
		->select('resource.id','resource.title','resource.keywords','reso_category.name as category',)
		->leftJoin('reso_category', 'reso_category.id', '=', 'resource.category_id')
		->orderBy('resource.title','asc')
		->where('resource.activation_status', 'active');

		if($id != null || $id != ''){
			$query = $query->where('resource.category_id', $id);
		}
		$data = $query->get();

		return Datatables::of($data)
		->addIndexColumn()  
		->addColumn('title', function($row){ 
			return '<p data-id="'.$row->id.'"  class="viewPost text-info" style="cursor: pointer; font-weight: 400" >'.$row->title.'</p>';  
		})
		->addColumn('action', function($row){
			$btn = '<i title="Delete" data-id="'.$row->id.'"  class="deleteData ti-close btn btn-outline-danger" data-target="#deleteModal" ></i> &emsp;';

			$btn = $btn.'<i title="Edit" data-id="'.$row->id.'"  class="editData icon-pencil btn btn-outline-info" data-target="#editModal" ></i>'; 

			return $btn;
		})
		->rawColumns(['title','action'])
		->make(true);
		return $data;

	}

	public function getResourceById($id)
	{
		$data = DB::table('resource')
		->select('resource.id','resource.title','resource.category_id','reso_category.name as category','resource.keywords','resource.description')
		->where('resource.id', $id)
		->leftJoin('reso_category','reso_category.id','=','resource.category_id')
		->where('resource.activation_status', 'active')
		->limit(1)
		->get();
		echo json_encode($data);

	}

	public function resourceDeleteById(Request $req)
	{

		$ccObj = new CommonController(); 
		$tableName = 'resource';
		$columnName = 'id';
		$id = $req->id;
		if($ccObj->checkUserAccess("Resource","Delete") == "no_access"){

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


	public function resourceView($id = null)
	{
		if(session('user_type') == "Guest"){
			return view('no_access');
		}else{
			return view('resource/resource');
		}
	}
}