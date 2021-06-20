<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;

class UsersList extends Controller
{

	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('administration/users_list');		
	}

	function usersDataList(Request $req)
	{

		if($req->ajax()){
			$data = DB::table('users')
			->select('id','imageUrl','name','email','phone','gender','birth_date','marital_status','religion','nationality')
			->where('activation_status','active')
			->get();

			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('imageUrl', function($row){
				$img = $row->imageUrl;
				if ($img != '') {
					$img = '<img class="img-circle" data-id="'.$row->id.'" src="uploads/userimages/'.$row->imageUrl.'" width="40px">'; 
				} else { 
					$img = '<img data-id="'.$row->id.'" src="assets/images/man.png" width="40px">';
				}
				return $img;
			})
			->addColumn('action', function($row){
				$btn = '<i title="Delete" data-id="'.$row->id.'"  class="deleteData ti-close btn btn-outline-danger" data-target="#deleteModal" ></i>';
				return $btn;
			})
			->rawColumns(['imageUrl','action'])
			->make(true);
			return $data;

		}

	}
	
	

	function generalInfo(Request $req) 
	{	
		$dt = Carbon::now();
		$general_info = array();
		$acadamic_info = array();
		$error_list = array();

		$general_info['password'] = md5("121212");
		$general_info['name'] = trim($req->user_name);
		$general_info['email'] = trim($req->user_email);
		$general_info['phone'] = trim($req->phone_number);
		$general_info['role'] = trim($req->user_role);
		$general_info['gender'] = trim($req->gender);
		$general_info['admitted_class'] = $req->admitted_class;
		$general_info['marital_status'] = trim($req->marital_status);
		$general_info['blood_group'] = trim($req->blood_group);
		$general_info['religion'] = trim($req->religion);
		$general_info['birth_date'] = trim($req->birth_date);
		$general_info['nationality'] = trim($req->nationality);
		$file = $req->file('user-picture');
		$general_info['created_by'] = session('id');


		$acadamic_info['class_id'] = $req->admitted_class;
		$acadamic_info['created_by'] = session('id');
		
		if($req->user_role == "Student"){
			$year = $dt->format("Y");
			$countValue = $this->numberOfStudent($req->admitted_class,$year)+1;

			if($countValue < 10){
				$general_info['userName'] = $year."000000".$countValue;
			}else if($countValue > 9 && $countValue < 100){
				$general_info['userName'] = $year."00000".$countValue;
			}else if($countValue > 99 && $countValue < 1000){
				$general_info['userName'] = $year."0000".$countValue;
			}
		}

		$ccObj = new CommonController();
		// $uaObj = new UserAccess();

		if($general_info['phone'] == ""){
			array_push($error_list, "Phone number required");
		}else{
			if(strlen($general_info['phone']) >13 || strlen($general_info['phone']) < 11){
				array_push($error_list, "Invalid phone number");
			}
		}
		if($general_info['email'] != ""){
			if(count($ccObj->checkDataDuplicacy("users", "email", $general_info['email']))>0){
				array_push($error_list, "This email already exist");
			}
		}

		if(count($ccObj->checkDataDuplicacy("users", "phone", $general_info['phone']))>0){
			array_push($error_list, "This phone number already exist");
		}

		// File upload with validation start
		if($file != ""){
			$file_extension = $file->getClientOriginalExtension();
			if($ccObj->fileExtensionsAllowed($file_extension) == "allowed"){
				
				$file_size = $file->getSize();
					if($file_size <= 2100000){  // Allowed file size is 2.1 MB
						try{
							$general_info['imageUrl'] = time().'.'.$file->getClientOriginalExtension();
							//$file->move('uploads/userimages',$data['imageUrl']);
						}catch(Exception $e){
							echo $e;
						}
					}else{
						array_push($error_list, "Please try with a smaller file size");
					}
				}else{
					array_push($error_list, "Attached file type is not allowed");
				}
			}

			if(count($error_list)>0){
				return response()->json(array("result" => "error", "message" => $error_list));
			}else{

				$req->session()->put('general_info', $general_info);
				$req->session()->put('acadamic_info', $acadamic_info);

				return response()->json(array("result" => "success"));

		// 	if($data['user_type'] == "Guest"){
		// 		$result = DB::table('teachers')->insert($data);
		// 		if($result){
		// 			return response()->json(array("result" => "success", "message" => "Data saved successfully"));
		// 		}else{
		// 			return response()->json(array("result" => "error", "message" => "Something went weong"));
		// 		}
		// 	}else{

		// 	}
			}
		}

		function numberOfStudent($admitted_class,$year)
		{
			$data = DB::table('users')
			->where('role','Student')
			->where('admitted_class',$admitted_class)
			->whereYear('created_at',$year)
			->count();
			return $data;
		}

		public function guardianInfo(Request $req)
		{
			$guardian_info = array();

			$guardian_info['father_name'] = trim($req->father_name);
			$guardian_info['father_occupation'] = trim($req->father_occupation);
			$guardian_info['father_phone'] = trim($req->father_phone);
			$guardian_info['mother_name'] = trim($req->mother_name);
			$guardian_info['mother_occupation'] = trim($req->mother_occupation);
			$guardian_info['mother_phone'] = trim($req->mather_phone);
			$guardian_info['created_by'] = session('id');

			$req->session()->put('guardian_info', $guardian_info);

			return response()->json(array("result" => "success","info"=>$req->session()->get('general_info')));

		}
		public function addressInfo(Request $req)
		{
			$address = array();

			$address['paressent_village'] = trim($req->paressent_village);
			$address['paressent_post_office'] = trim($req->paressent_post_office);
			$address['paressent_thana_id'] = $req->paressent_thana_id;
			$address['paressent_district_id'] = $req->paressent_district_id;

			$address['parmanent_village'] = trim($req->parmanent_village);
			$address['parmanent_post_office'] = trim($req->parmanent_post_office);
			$address['parmanent_thana_id'] = $req->parmanent_thana_id;
			$address['parmanent_district_id'] = $req->parmanent_district_id;

			$paressent = trim($req->paressent_village).trim($req->paressent_post_office).$req->paressent_district_id.$req->paressent_thana_id;

			$parmanent = trim($req->parmanent_village).trim($req->parmanent_post_office).$req->parmanent_district_id.$req->parmanent_thana_id;

			if($paressent == $parmanent)
				$address['same_address'] = "Yes";
			else
				$address['same_address'] = "No";

			$address['created_by'] = session('id');

			$req->session()->put('address', $address);

			return response()->json(array("result" => "success"));

		}

		public function educationStudentInfo(Request $req)
		{
			$psc_info = array();
			$psc_info['institute_name'] = trim($req->pscSchoolName);
			$psc_info['exam_type'] = trim($req->pscExamName);
			$psc_info['division_id'] = $req->pscDivision."/".$req->pscDistrict_id."/".$req->pscThana_id;
			$psc_info['district_id'] = $req->pscDivision."/".$req->pscDistrict_id."/".$req->pscThana_id;
			$psc_info['thana_id'] = $req->pscDivision."/".$req->pscDistrict_id."/".$req->pscThana_id;
			$psc_info['result'] =  trim($req->pscResult);
			$psc_info['passing_year'] = trim($req->pscPassingYear);
			$psc_info['created_by'] = session('id');

			$jsc_info = array();
			$jsc_info['institute_name'] = trim($req->jscSchoolName);
			$jsc_info['exam_type'] = trim($req->jscExamName);
			$jsc_info['board'] = $req->jscBoard;
			$jsc_info['result'] = trim($req->jscResult);
			$jsc_info['passing_year'] = trim($req->jscPassingYear);
			$jsc_info['created_by'] = session('id');

			$guardian_info = array();
			$guardian_info = $req->session()->get('guardian_info');
			$address = array();
			$address = $req->session()->get('address');
			$acadamic_info = array();
			$acadamic_info = $req->session()->get('acadamic_info');


			try{
				DB::beginTransaction();
				$user = DB::table('users')->insert($req->session()->get('general_info'));

				$user_id = DB::getPdo()->lastInsertId();
				$guardian_info['user_id'] = $user_id;
				$address['user_id'] = $user_id;
				$acadamic_info['user_id'] = $user_id;
				$psc_info['user_id'] = $user_id;
				$jsc_info['user_id'] = $user_id;

				$gurdian = DB::table('guardian_informations')->insert($guardian_info);
				$address = DB::table('addresses')->insert($address);
				$acadamic = DB::table('acadamic_informations')->insert($acadamic_info);
				$psc = DB::table('education_informations')->insert($psc_info);
				if($req->jscSchoolName != "" && $req->jscPassingYear != ""){
					$jsc = DB::table('education_informations')->insert($jsc_info);
				}
				DB::commit();

				if($user && $gurdian && $address && $acadamic && $psc || $jsc ){
					return response()->json(array("result" => "success", "message" => "Data saved successfully"));
				}
			}catch(Exception $e) {
				DB::rollback();
				return response()->json(array("result" => "fail", "message" => $e));
			}

		}


		public function educationTeacherInfo(Request $req)
		{
			$ssc_info = array();
			$ssc_info['institute_name'] = trim($req->schoolName);
			$ssc_info['exam_type'] = trim($req->sscExamType);
			$ssc_info['group'] = trim($req->sscGroup);
			$ssc_info['board'] = $req->sscBoard;
			$ssc_info['result'] = trim($req->sscResult);
			$ssc_info['passing_year'] = trim($req->sscPassingYear);
			$ssc_info['created_by'] = session('id');

			$hsc_info = array();
			$hsc_info['institute_name'] = trim($req->collageName);
			$hsc_info['exam_type'] = trim($req->hscExamType);
			$hsc_info['group'] = trim($req->hscGroup);
			$hsc_info['board'] = $req->hscBoard;
			$hsc_info['result'] = trim($req->hscResult);
			$hsc_info['passing_year'] = trim($req->hscPassingYear);
			$hsc_info['created_by'] = session('id');

			$bsc_info = array();
			$bsc_info['institute_name'] = trim($req->versityName);
			$bsc_info['exam_type'] = trim($req->bscExamType);
			$bsc_info['subject_name'] = trim($req->bscSubject);
			$bsc_info['corse_duration'] = trim($req->bscCourseDuration);
			$bsc_info['result'] = trim($req->bscResult);
			$bsc_info['passing_year'] = trim($req->bscPassingYear);
			$bsc_info['created_by'] = session('id');

			$msc_info = array();
			$msc_info['institute_name'] = trim($req->mscVersityName);
			$msc_info['exam_type'] = trim($req->mscExamType);
			$msc_info['subject_name'] = trim($req->mscSubject);
			$msc_info['corse_duration'] = trim($req->mscCourseDuration);
			$msc_info['result'] = trim($req->mscResult);
			$msc_info['passing_year'] = trim($req->mscPassingYear);
			$msc_info['created_by'] = session('id');

			$guardian_info = array();
			$guardian_info = $req->session()->get('guardian_info');
			$address = array();
			$address = $req->session()->get('address');
			$acadamic_info = array();
			$acadamic_info = $req->session()->get('acadamic_info');

			try{
				DB::beginTransaction();
				$user = DB::table('users')->insert($req->session()->get('general_info'));

				$user_id = DB::getPdo()->lastInsertId();
				$guardian_info['user_id'] = $user_id;
				$address['user_id'] = $user_id;
				$ssc_info['user_id'] = $user_id;
				$hsc_info['user_id'] = $user_id;
				$bsc_info['user_id'] = $user_id;
				$msc_info['user_id'] = $user_id;

				$gurdian = DB::table('guardian_informations')->insert($guardian_info);
				$address = DB::table('addresses')->insert($address);
				$acadamic = DB::table('acadamic_informations')->insert($acadamic_info);
				$ssc = DB::table('education_informations')->insert($ssc_info);
				$hsc = DB::table('education_informations')->insert($hsc_info);
				$bsc = DB::table('education_informations')->insert($bsc_info);

				if($req->mscVersityName != "" && $req->mscPassingYear != ""){
					$msc = DB::table('education_informations')->insert($msc_info);
				}
				DB::commit();

				if($user && $gurdian && $address && $acadamic && $ssc && $hsc && $bsc || $msc ){
					return response()->json(array("result" => "success", "message" => "Data saved successfully"));
				}
			}catch(Exception $e) {
				DB::rollback();
				return response()->json(array("result" => "fail", "message" => $e));
			}

			return response()->json(array("result" => "success"));
		}



		public function userDeleteByID(Request $req)
		{

			$ccObj = new CommonController(); 
			$tableName = 'users';
			$columnName = 'id';
			$id = $req->id;

			$result = $ccObj->dataDeletion($tableName,$columnName,$id);

			if($result > 0 ){
				return response()->json(array("result" => "success", "message" => "Data delete successfully"));
			}else{
				return response()->json(array("result" => "error", "message" => "Something went weong"));
			}
		}


	}