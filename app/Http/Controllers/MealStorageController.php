<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MealStorage;
use Illuminate\Support\Facades\DB;

class MealStorageController extends Controller
{
    function addData(Request $req){
        $memberName = $req->input('memberName');
        $mealCount = $req->input('mealCount');
        $dateVal = $req->input('dateVal');
        $daily_date = $req->input('daily_date');
        $mem_id = DB::table('members')->where('name',$memberName[0])->value('member_id');
        $validity = DB::table('meal_storages')->where('date',$daily_date)->value('date');
        if($validity ==null){
            for($i=0; $i<sizeof($memberName);$i++){
                $mem_id = DB::table('members')->where('name',$memberName[$i])->value('member_id');
                $totalMember[]=[
                    'id'=> Auth::user()->id,
                    'ym_id'=> $dateVal,
                    'member_id'=>$mem_id,
                    'date'=>$daily_date,
                    'meal'=>$mealCount[$i]
                ] ;
            }
            MealStorage::insert($totalMember);
        }
        else{
            print_r($validity);
        }
        
        

    }

    function findAllData(Request $req){
        $data = MealStorage::where('id',$req->id,'date',$req->date)->find();
        return response()->json($data);
    }

    public function add_sheet(){
        $userId = Auth::user()->id;
        print_r($userId);
        $allYM = DB::table('year_months')->where('id',$userId)->get();
       // print_r($allYM);

        function GetMonthYear($YM){
            foreach($YM as $ym){
                $yearMonth[]=[
                    'ymId'=> $ym->id,
                    'month'=> date('F', mktime(0, 0, 0,substr($ym->year_month,5,-3), 10)),
                    'year'=> substr($ym->year_month,0,-6),

    
                ];
              

            }
            return $yearMonth;
           

        }
      $yearMonth =   GetMonthYear($allYM);
        return view('layouts._addMealSheet',compact('yearMonth'));
    }
    public function view_sheet(){
        return view('layouts._viewMealChart');
    }

    }
