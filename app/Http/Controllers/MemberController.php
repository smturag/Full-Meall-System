<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class MemberController extends Controller
{
    public function addData(Request $req)
    {
        $member = new Member();
        $nameArray = [];
        $nameArray = $req->input('name');

        function CheckDuplicate($nameArray)
        {
            $count = 0;
            if (1 === count(array_unique($nameArray))) {
                $count++;
                return $count;
            } else {
                return $count;

            }

        }
        $duplicate = CheckDuplicate($nameArray);
        $ym_id = DB::table('year_months')->where('year_month',$req->input("date"))->where('id',Auth::user()->id)->value('ym_id');
        print_r($ym_id);
        if($duplicate <1){
            if ($nameArray != null) {
                $sizeOfNameArray = sizeof($req->input('name'));
                $nameArray = $req->input('name');
                for ($i = 0; $i < $sizeOfNameArray; $i++) {
                    $fullArray[] = [
                        'id' => Auth::user()->id,
                        'name' => $nameArray[$i],
                        'monthYear' => $ym_id,
                    ];
    
                }
                Member::insert($fullArray);
                $allData = DB::select('select * from members where monthYear = :my', ['my' => $req->input("date")]);
                print_r($allData);
                //  return view('layouts._viewMealChart',compact('allData'));
                // return view('layouts.demo',compact('allData'));
                // return back()->with(["error" => "Member not inserted"]);
                return redirect()->route('viewSheet');
            } else {
                return back()->with(["error" => "Member not inserted"]);
            }


        }else{
            DB::delete('delete from year_months where ym_id= ? ', [$ym_id]);
            return back()->with(["error" => "Duplicate Name Found"]);
        }



    }

    public function findAllMemberByMonth(Request $req)
    {
        $date = date("Y/m/d");
        $AdminId = Auth::user()->id;
        $day = 01;
        $month = $req->input('getMonth');
        $year = $req->input('getYear');
        $date = $year . '-' . $month . '-' . $day;
        $allMember = DB::select('select name from members where id= :id AND monthYear = :my', ['id' => $AdminId, 'my' => $date]);
        $dates = array();
        $currentDate = date('d');

        for ($d = 1; $d <= 1; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month) {
                $dates[] = date('Y-m-d', $time);
            }

        }
        //print_r($dates);
        if ($allMember != null) {
            return view('layouts._addMealData', compact('allMember', 'dates', 'date'));
        } else {
            return back()->with(['error' => 'no data available']);
        }

    }

    public function findData(Request $req)
    {
        $data = Member::where('id', $req->id, 'date', $req->date)->find();
        return response()->json($data);
    }

    public function viewLayout()
    {

        return view('layouts._addMember');
    }
    // public function viewLayout(){

    //     return view('layouts._profile');
    // }

}
