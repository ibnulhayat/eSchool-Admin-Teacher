<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;

class Attendance extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('attendance');
    }

    function studentListByClassId($class_id)
    {
        $dt = Carbon::now();
        $date = $dt->format("Y-m-d");
        $data = DB::table('acadamic_informations')
        ->select('acadamic_informations.user_id as id','users.userName as student_id','users.name',)
        ->leftJoin('users','users.id','=','acadamic_informations.user_id')
        ->where('acadamic_informations.class_id',$class_id)
        ->get();

        echo json_encode($data);
    }

    function makeAttendance(Request $req)
    {
        $ccObj = new CommonController();
        $sub_data = $req->all();

        $value = $ccObj->checkDuplicacyTwoColumn("attendances", "user_id", $sub_data['user_id'], "class_id", $sub_data['class_id']);

        $data['class_id'] = $sub_data['class_id'];
        $data['user_id'] = $sub_data['user_id'];
        $data['availability'] = $sub_data['attendace'];

        try{

            if(count($value) > 0){

                $data['updated_by'] = session('id');
                $result = DB::table('attendances')
                ->where('id', $value[0]->id)
                ->update($data);

            }else{

                $data['created_by'] = session('id');
                $result = DB::table('attendances')->insert($data);

            }



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
