<?php

namespace App\Http\Controllers;

use App\Models\YearMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class YearMonthController extends Controller
{
    public function addData(Request $req)
    {
        $ym = new YearMonth();
        $userId = Auth::user()->id;
        $day = 01;
        $get_date = $req->input('date');
        $get_date = substr($get_date, 0, -2) . '' . $day;
        $get_id = DB::table("year_months")->where('year_month', $get_date)->where('id',$userId)->value('ym_id');
        $ym->id = $userId;
        $checkMembers = DB::table('members')->where('monthYear', $get_id)->where('id',$userId)->value('name');
        print_r($checkMembers);

        if ($checkMembers != null) {
            return  back()->with('error',"This id already exist");

        } else {
            if($get_id != null){
                return back()->with(['date'=>$get_date]);
            }else{
                $ym->id = Auth::user()->id;
                $ym->year_month = $get_date;
                $ym->save();
                return back()->with(['date'=>$get_date]);
            }
            
        }

        

    }
}
