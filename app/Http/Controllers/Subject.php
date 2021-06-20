<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class Subject extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('subject/subject');
        
    }
    public function addSubject(Request $req)
    {
        $ccObj = new CommonController();
        $data['full_name'] = trim($req->full_name);
        $data['short_name'] = trim($req->short_name);
        $data['created_by'] = session('id');

        $value = $ccObj->checkThanaDuplicacy('subjects', 'full_name', $data['full_name'],'short_name',$data['short_name']);

        $editId = $req->edit_id;

        if($editId == ""){
            if (count($value) > 0) {
                return response()->json(array("result" => "error", "message" => "This referral item already exist"));
            }else{
                // if($ccObj->checkUserAccess("Referral","Add") == "no_access"){

                //  return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
                // }else{
                $result = DB::table('subjects')->insert($data);
                if($result){
                    return response()->json(array("result" => "success", "message" => "Data saved successfully"));
                }else{
                    return response()->json(array("result" => "error", "message" => "Something went weong"));
                }
                //}
            }
        }else{
            // if($ccObj->checkUserAccess("Referral","Edit") == "no_access"){

            //  return response()->json(array("result" => "error", "message" => "Sorry you don't have access. Please contact with the admin."));
            // }else{
            $data['updated_by'] = session('id');
            $result = DB::table('subjects')->where('id', $editId)->update($data);
            if($result){
                return response()->json(array("result" => "success", "message" => "Data update successfully"));
            }else{
                return response()->json(array("result" => "error", "message" => "Something went weong"));
            }
            //}
        }

    }



    function subjectList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('subjects')
            ->select('subjects.id','subjects.full_name','subjects.short_name')
            ->where('subjects.activation_status', 'active')
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


    public function getSubjectById($id)
    {
        $data = DB::table('subjects')
        ->select('subjects.id','subjects.full_name','subjects.short_name')
        ->where('subjects.id', $id)
        ->where('subjects.activation_status', 'active')
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
