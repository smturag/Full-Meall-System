<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminstration;
use Illuminate\Support\Facades\Hash;

class AdministrationController extends Controller
{
    function addData(Request $req){
        $adminstration= new Adminstration();
        $adminstration->id = $req->input('id');
        $adminstration->userName = $req->input('userName');
        $adminstration->password = $req->input('password');
        $adminstration->rePassword = $req->input('rePassword');
        $adminstration->mail = $req->input('mail');
        if($req->input('password')=== $req->input('rePassword')){
            $adminstration->save();
            return response()->json($adminstration);
        }else{
            return response([
                'error'=>["Error"]
            ]);
        }

    }
    public function index(){
        $data = Adminstration::all();
        return response()->json($data);
    }

    public function login($mail,$password){
        $data = Adminstration::where('mail',$mail,)->first();

        if( strcmp($password, $data->password)===0){
            return response()->json($data);
        }else{
            return "Check again";
        }
           
    }

    public function profile(){
        return view('layouts._profile');
    }

    public function master(){
        return view('master');
    }

}
