<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amount;

class AmountController extends Controller
{
    function addData(Request $req){
        $amount = new Amount();
        $amount->id = $req->input('id');
        $amount->member_id = $req->input('member_id');
        $amount->amount = $req->input('amount');
        $amount->date = $req->input('date');
        $amount->save();
        return response()->json($amount);
    }
    function findData(Request $req){
        $data = Amount::where('id',$req->id,'member_id',$req->member_id,'date',$req->date)->first();
        return response()->json($data);
    }
}
