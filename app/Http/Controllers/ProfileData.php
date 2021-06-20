<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class ProfileData extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function myProfile()
    {
        return view('user/my_profile');
    }

    function myProfileData()
    {
        $user_id = session('id');
        $data = DB::table('users')
        ->select('users.id','users.name','users.phone','users.email',
            'users.imageUrl','users.role','users.gender','users.birth_date','users.marital_status','users.blood_group','users.religion','users.nationality')
        ->where('users.activation_status', 'active')
        // ->leftJoin('group_list', 'group_list.id', '=', 'users.user_type')
        // ->where('users.id', $user_id)
        ->get();
        return response()->json($data);
    }


    function myProfileEdit(Request $req)
    {
        $id_user = session('id');
        $error_list = array();
        $data = array();

        $data['name'] = trim($req->name);
        $data['phone'] = trim($req->phone);
        $data['email'] = trim($req->user_email);
        $data['address'] = trim($req->address);

        $ccObj = new CommonController();

        if($data['phone'] == ""){
            array_push($error_list, "Phone number required");
        }else{
            if(strlen($data['phone']) >13 || strlen($data['phone']) < 11){
                array_push($error_list, "Invalid phone number");
            }
        }
        
        if($data['email'] == ""){
            // if(count($ccObj->checkDataDuplicacy("users", "email", $data['email']))>0){
            //  array_push($error_list, "This email already exist");
            // }
            array_push($error_list, "E-mail address required");
        }


        // if(count($ccObj->checkDataDuplicacyOnEdit("users", "phone", $data['phone'], "id", $id_user))>0){
        //  array_push($error_list, "This phone number already exist");
        // }


        // File upload with validation start
        $file = $req->file('user-picture');
        if($file != ""){
            $file_extension = $file->getClientOriginalExtension();
            if($ccObj->fileExtensionsAllowed($file_extension) == "allowed"){
                $file_size = $file->getSize();
                if($file_size <= 2100000){  // Allowed file size is 2.1 MB
                    //$destinationPath = 'uploads/userimages';
                    try{
                        $data['image'] = time().'.'.$file->getClientOriginalExtension();
                        $file->move('uploads/userimages',$data['image']);
                    }catch(Exception $e){
                        echo $e;
                    }
                }else{
                    array_push($error_list, "Try with a smaller file size");
                }
            }else{
                array_push($error_list, "Attached file type is not allowed");
            }
        }
        // File upload with validation end


        if(count($error_list)>0){
            return response()->json(array("result" => "error", "message" => $error_list));
        }else{
            try{
                DB::table('teachers')
                ->where('id', $id_user)
                ->limit(1)
                ->update($data);
                return response()->json(array("result" => "success", "message" => "Data updated successfully"));
            }catch(Exception $e) {
                return response()->json(array("result" => "error", "message" => $e));
            }
        }
    }

    
    function changePass(Request $req)
    {
        $old_password = trim($req->old_password);
        $password = trim($req->password);
        $re_password = trim($req->re_password);
        $id_user = session('id');

        $error_list = array();


        if($password == "" || $re_password == "" || $old_password == ""){
            array_push($error_list, "Fill the required fields");
        }else{
            if($password != $re_password){
                array_push($error_list, "Password and re-typed password didn't matched");
            }else{
                if(strlen($password) < 6){
                    array_push($error_list, "At least 6 characters password required");
                }else{
                    $oldPassCheck = DB::table('teachers')
                    ->where('id', $id_user)
                    ->where('activation_status', 'active')
                    ->where('password', md5($old_password))
                    ->count();

                    if($oldPassCheck < 1){
                        array_push($error_list, "Wrong old password given");
                    }
                }
            }
        }

        

        if(count($error_list)>0){
            return response()->json(array("result" => "error", "message" => $error_list));
        }else{
            $updateData['password'] = md5($password);
            try{
                DB::table('teachers')
                ->where('id', $id_user)
                ->limit(1)
                ->update($updateData);
                return response()->json(array("result" => "success", "message" => "Password changed successfully"));
            }catch(Exception $e) {
                return response()->json(array("result" => "error", "message" => $e));
            }
        }
    }

}
