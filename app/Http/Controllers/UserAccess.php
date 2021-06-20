<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccess extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('settings/user_access');
	}


	function moduleList()
	{
		$data = DB::table('page_users')
		->select('page_name','module_name')
		->groupBy('page_name')
		->groupBy('module_name')
		->get();
		echo json_encode($data);
	}

	function givenPageAccess($user_id)
	{
		$user_page = DB::table('page_users')
		->select('page_name','module_name')
		->groupBy('page_name')
		->groupBy('module_name')
		->get();

		$data = DB::table('users')
		->select('group_list.name as user_type')
		->leftJoin('group_list','group_list.id','=','users.user_type')
		->where('users.id',$user_id)
		->limit(1)
		->get();

		$count = 0;

		if ($data[0]->user_type == "User"){
			foreach($user_page as $data ) {
				$userPage = array();
				if($data->page_name == "Report"){
					$userPage['page_name'] = $data->page_name;
					$userPage['module_name'] = $data->module_name;
					$userPage['user_id'] = $user_id;
					$userPage['allow_deny'] = 'deny';
					$userPage['id_user_access_given_by'] = session('id');
				}else{
					$userPage['page_name'] = $data->page_name;
					$userPage['module_name'] = $data->module_name;
					$userPage['user_id'] = $user_id;
					$userPage['allow_deny'] = 'allow';
					$userPage['id_user_access_given_by'] = session('id');
				}
				DB::table('page_users')->insert($userPage);

				$count++;
			}
		}else if ($data[0]->user_type != "Guest"){
			foreach($user_page as $data ) {
				$userPage = array();
				if($data->page_name){
					$userPage['page_name'] = $data->page_name;
					$userPage['module_name'] = $data->module_name;
					$userPage['user_id'] = $user_id;
					$userPage['allow_deny'] = 'allow';
					$userPage['id_user_access_given_by'] = session('id');
				}
				DB::table('page_users')->insert($userPage);
				$count++;
			}
		}

		return $count;
	}

	
	function userList()
	{
		$data = DB::table('users')
		->select('users.id','users.name', 'users.phone', 'group_list.name as usertype')
		->leftJoin('group_list', 'group_list.id', '=', 'users.user_type')
		->where('users.activation_status','=', 'active') 
		->where('group_list.name','!=', 'Admin') 
		->where('group_list.name','!=', 'Guest')
		->where('users.id','!=', session('id'))
		->get(); 
		return response()->json($data);
	}


	function pageListByUserId($id_user)
	{
		$data = DB::table('page_users')
		->select('page_name','module_name','id_page_users','allow_deny')
		->where('user_id',$id_user)
		->get();

		echo json_encode($data);
	}


	function allowOrDenyAccess(Request $req)
	{

		$submitted_data = $req->all();

		$data['id_user_access_given_by'] = session('id');
		$data['allow_deny'] = $submitted_data['allow_deny'];

		try{

			$result = DB::table('page_users')
			->where('id_page_users', $submitted_data['id_page_users'])
			->where('user_id', $submitted_data['id_user'])
			->update($data); 

			if($result){
				return response()->json(array("result" => "success", "message" => "Status Change successfully"));
			}else{
				return response()->json(array("result" => "error", "message" => "Something went weong"));
			}
		}catch(Exception $e) {
			return response()->json(array("result" => "error", "message" => $e));
		}

	}
}
