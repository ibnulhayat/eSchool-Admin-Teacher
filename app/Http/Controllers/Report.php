<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;

class Report extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	
	public function reportView()
	{
		return view('report/report');
	}

	public function allCallerDataList(Request $req)
	{

		if($req->ajax()){
			$data = DB::table('caller_info')
			->select('caller_info.id','caller_info.unique_id','caller_info.phone','caller_info.name','caller_info.gender','caller_info.age','caller_info.marital_status','districts.name as district','upazilas_or_thanas.name as thana','caller_info.source_of_knowing') 
			->leftJoin('districts', 'districts.id', '=', 'caller_info.district_id')
			->leftJoin('upazilas_or_thanas', 'upazilas_or_thanas.id', '=', 'caller_info.thana_id')
			->where('caller_info.activation_status','active')
			->orderby('caller_info.id','desc')
			->get();

			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('call_before',function ($row)
			{
				$count = DB::table('caller_service')
				->where('unique_id',$row->unique_id)
				->count();
				$value="";
				if($count > 1){
					$value = $count." Times";
				}else{
					$value = $count." Time";
				}
				return $value;  
			})
			->addColumn('action', function($row){
				if(session('user_type') != "Guest"){
					$btn = ' <i title="Delete" data-id="'.$row->id.'"  class="infoDeleteData ti-close btn btn-outline-danger" data-target="#deleteModal" ></i>';
					$btn = $btn.'&emsp; <i title="Edit" data-id="'.$row->id.'"  class="infoEditData icon-pencil btn btn-outline-info" data-target="#editModal" ></i>'; 
				}else{
					$btn = '<i title="Only View"   class="icon-eye btn btn-outline-dark" ></i>';
				}
				
				return $btn;
			})

			->rawColumns(['action','call_before'])
			->make(true);
			return $data;

		}

	}

	public function callerDeleteById(Request $req)
	{

		$ccObj = new CommonController(); 
		$tableName = 'caller_info';
		$columnName = 'id';
		$id = $req->id;
		if($ccObj->checkUserAccess("Report","Delete") == "no_access"){

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



	public function reportDataTable(Request $req)
	{

		if($req->ajax()){
			$data = DB::table('caller_service')
			->select('caller_service.id','caller_service.unique_id','caller_service.medication','caller_service.symptom','caller_service.issue_of_counseling','caller_service.call_duration','caller_service.created_at','caller_info.phone as phone','caller_info.name as name','caller_info.gender as gender','caller_info.age as age','users.name as counselor') 
			->leftJoin('caller_info', 'caller_info.unique_id', '=', 'caller_service.unique_id')
			->leftJoin('users', 'users.id', '=', 'caller_service.created_by')
			->where('caller_service.activation_status','active')
			->orderby('caller_service.id','desc')
			->get();


			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('call_before',function ($row)
			{
				$count = DB::table('caller_service')
				->where('unique_id',$row->unique_id)
				->count();
				$value="";
				if($count > 1){
					$value = "Old Caller";
				}else{
					$value = "New Caller";
				}
				return $value;  
			})
			->addColumn('localdate',function ($row)
			{
				$to = Carbon::parse($row->created_at)->format('d/m/Y g:i A'); 

				return $to;  
			})
			->addColumn('action', function($row){
				if(session('user_type') != "Guest"){
					$btn = ' <i title="Delete" data-id="'.$row->id.'"  class="serviceDeleteData ti-close btn btn-outline-danger" data-target="#deleteModal" ></i>';

					$btn = $btn.'&emsp; <i title="Edit" data-id="'.$row->id.'"  class="serviceEditData icon-pencil btn btn-outline-info" data-target="#editModal" ></i>'; 
				}else{
					$btn = '<i title="Only View"   class="icon-eye btn btn-outline-dark" ></i>';
				}
				return $btn;
			})

			->rawColumns(['action','call_before','localdate'])
			->make(true);
			return $data;

		} 

	}

	public function reportDeleteById(Request $req)
	{

		$ccObj = new CommonController(); 
		$tableName = 'caller_service';
		$columnName = 'id';
		$id = $req->id;
		if($ccObj->checkUserAccess("Report","Delete") == "no_access"){

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


	function getCallerInfoById($id)
	{
		$info = DB::table('caller_info')
		->select('id','name','phone','email','gender','age','marital_status','call_before','district_id','thana_id','source_of_knowing')
		->where('id',$id)
		->where('activation_status', 'active')
		->limit(1)
		->get();
		echo json_encode($info);
	}

	function updateCallerInfo(Request $req)
	{
		$ccObj = new CommonController();
		$error_list = array();
		$caller_info = array();

		$editId = $req->edit_id;
		// caller information
		//$caller_info['unique_id'] = $req->unique_id;
		$caller_info['name'] = trim($req->caller_name);
		$caller_info['phone'] = $req->phone_num;
		$caller_info['email'] = trim($req->caller_email);
		$caller_info['gender'] = trim($req->gender);
		$caller_info['age'] = $req->age;
		$caller_info['marital_status'] = trim($req->marital_status);
		$caller_info['call_before'] = trim($req->call_before);
		$caller_info['district_id'] = $req->district_id;
		$caller_info['thana_id'] = $req->thana_id;
		$caller_info['source_of_knowing'] = trim($req->source_of_knowing);

		if($caller_info['phone'] == ""){
			array_push($error_list, "Caller Phone number required");
		}else{
			if(strlen($caller_info['phone']) >13 || strlen($caller_info['phone']) < 11){
				array_push($error_list, "Invalid phone number");
			}
		}
		if($caller_info['name'] == ""){
			array_push($error_list, "Caller name required");
		}

		if($caller_info['age'] < 0){
			array_push($error_list, "Nagetive age not accepted");
		}

		if(count($error_list)>0){
			return response()->json(array("result" => "error", "message" => $error_list));
		}else{
			if($ccObj->checkUserAccess("Report","Edit") == "no_access"){

				return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
			}else{
				$caller_info['updated_by'] = session('id');
				$result = DB::table('caller_info')->where('id', $editId)->update($caller_info);

				if($result){
					return response()->json(array("result" => "success", "message" => "Data update successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
			}
		}

	}

	function getCallerServiceById($id)
	{
		
		$service = DB::table('caller_service')
		->select('id','medication','therapeutic','problem_description','symptom','action_taken','risk_assessment','issue_of_counseling','services_of_refferral','reason_of_refferral','referral_id','call_duration','caller_feeling','call_type')
		
		->where('id',$id)
		->where('activation_status', 'active')
		->get();
		echo json_encode($service);
	}


	function updateCallerService(Request $req)
	{
		$ccObj = new CommonController();
		$caller_service = array();

		$editId = $req->ser_edit_id;

		$caller_service['medication'] = trim($req->medication);
		$caller_service['therapeutic'] = trim($req->therapeutic);
		$caller_service['problem_description'] = trim($req->problem_description);
		$caller_service['symptom'] = trim($req->symptom);
		$caller_service['action_taken'] = trim($req->action_taken);
		$caller_service['risk_assessment'] = trim($req->risk_assessment);
		$caller_service['issue_of_counseling'] = trim($req->issue_of_counseling);
		$caller_service['services_of_refferral'] = trim($req->services_of_refferral);
		$caller_service['reason_of_refferral'] = trim($req->reason_of_refferral);
		$caller_service['referral_id'] = trim($req->referral_id);
		$caller_service['call_duration'] = trim($req->call_duration);
		$caller_service['caller_feeling'] = trim($req->caller_feeling);
		$caller_service['call_type'] = trim($req->call_type);

		
		if($ccObj->checkUserAccess("Report","Edit") == "no_access"){

			return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
		}else{
			$caller_service['updated_by'] = session('id');
			$result = DB::table('caller_service')->where('id', $editId)->update($caller_service);

			if($result){
				return response()->json(array("result" => "success", "message" => "Data update successfully"));
			}else{
				return response()->json(array("result" => "error", "message" => "Something went weong"));
			}
		}

	}


}