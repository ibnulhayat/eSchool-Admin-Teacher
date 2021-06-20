<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class AddCaller extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index() 
	{
		$ccObj = new CommonController();
		if(session('user_type') == "Guest"){
			return view('no_access');
		}else{
			if($ccObj->checkUserAccess("Add Caller Information","Add Information") == "no_access"){
				return view('no_access');
			}
			return view('addcaller/addcaller');
		}
	}


	function addNewCaller(Request $req)
	{

		$error_list = array();
		$caller_info = array();
		$caller_service = array();

		// caller information
		$caller_info['unique_id'] = $req->unique_id;
		$caller_info['call_before'] = trim($req->call_before);
		$caller_info['phone'] = $req->phone_num;
		$caller_info['email'] = trim($req->caller_email);
		$caller_info['name'] = trim($req->caller_name);
		$caller_info['age'] = $req->age;
		$caller_info['district_id'] = $req->district_id;
		$caller_info['thana_id'] = $req->thana_id;
		$caller_info['gender'] = trim($req->gender);
		$caller_info['marital_status'] = trim($req->marital_status);
		$caller_info['source_of_knowing'] = trim($req->source_of_knowing);

		// caller service
		$caller_service['unique_id'] = $req->unique_id;
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
		$caller_service['created_by'] = session('id');

		$ccObj = new CommonController();



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

		$phoneNumber = $ccObj->checkDataDuplicacy("caller_info", "phone", $caller_info['phone']);
		$uni_id = $ccObj->checkDataDuplicacy("caller_info", "unique_id", $caller_info['unique_id']);

		if(count($uni_id)<1 && count($phoneNumber) > 0){
			array_push($error_list, "Please input caller phone Number and click fatch data button before adding this data.");
		}

		if(count($error_list)>0){
			return response()->json(array("result" => "error", "message" => $error_list));
		}else{
			if(count($uni_id) < 1 &&  count($phoneNumber) < 1){
				$caller_info['created_by'] = session('id');
				try{
					DB::beginTransaction();
					DB::table('caller_info')->insert($caller_info);

					DB::table('caller_service')->insert($caller_service);
					DB::commit();
					return response()->json(array("result" => "success", "message" => "Data saved successfully"));
				}catch(Exception $e) {
					DB::rollback();
					return response()->json(array("result" => "error", "message" => $e));
				}
			}else if (count($uni_id) == 1 &&  count($phoneNumber) == 1){

				DB::table('caller_info')->where('unique_id', $caller_info['unique_id'])->update($caller_info);

				$result = DB::table('caller_service')->insert($caller_service);
				if($result){
					return response()->json(array("result" => "success", "message" => "Data update successfully"));
				}else{
					return response()->json(array("result" => "error", "message" => "Something went weong"));
				}
			}

		}
	}


	function getFetchData($phone_uID)
	{
		$un_id = DB::table('caller_info')
		->where('unique_id',$phone_uID)
		->where('activation_status', 'deactive')
		->limit(1)
		->count();

		$phone = DB::table('caller_info')
		->where('phone',$phone_uID)
		->where('activation_status', 'deactive')
		->limit(1)
		->count();

		if($un_id == 1 || $phone == 1){
			echo json_encode("User blocked, Please contact admin.");
		}else{
			$info = DB::table('caller_info')
			->select('id','unique_id','name','phone','email','gender','age','marital_status','call_before','district_id','thana_id','source_of_knowing')
			->where('unique_id',$phone_uID)
			->orWhere('phone',$phone_uID)
			->where('activation_status', 'active')
			->limit(1)
			->get();

			if(count($info) > 0){
				$service = DB::table('caller_service')
				->select('caller_service.id','caller_service.unique_id','caller_service.medication','caller_service.therapeutic','caller_service.problem_description','caller_service.symptom','caller_service.action_taken','caller_service.risk_assessment','caller_service.issue_of_counseling','caller_service.services_of_refferral','caller_service.reason_of_refferral','caller_service.referral_id','caller_service.call_duration','caller_service.caller_feeling','caller_service.call_type','caller_service.created_at', DB::raw("DATE_FORMAT(caller_service.created_at, '%d-%m-%Y %h:%i %p') as date"),'users.name as counselor')
				->leftJoin('users', 'users.id', '=', 'caller_service.created_by')
				->where('caller_service.unique_id',$info[0]->unique_id)
				->where('caller_service.activation_status', 'active')
				->orderby('caller_service.id','desc') 
				->get();

				echo json_encode(array(array("info" => $info, "service" => $service ))); 
			}else{
				echo json_encode("Data not found.");
			}
		}

	}


}