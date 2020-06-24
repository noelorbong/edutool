<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function doc($token){

        $tos = DB::table('tos')
            ->select('*')
            ->where('token', '=', $token)
            ->first();

        $tos_datas = DB::table('tos_data')
            ->select('*')
            ->where('token', '=', $token)
            ->get();
        
        return view('doc',compact('tos','tos_datas'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $token = str_random(25);

        
        foreach ($request->tos_datas as $value){

               DB::table('tos_data')->insert(
                    [
                    'user_id' =>  $user->id,
                    'token' => $token,
                    'topics' => $value['topics'],
                    'no_of_hours' => $value['no_of_hours'],
                    'percent' => $value['percent'],
                    'remember' => $value['remember'],
                    'understand' => $value['understand'],
                    'apply' => $value['apply'],
                    'analyze' => $value['analyze'],
                    'evaluate' => $value['evaluate'],
                    'create' => $value['create'],
                    'total' => $value['total'],
                    ]
                );
        }

        DB::table('tos')->insert(
            [
            'user_id' =>  $user->id,
            'token' => $token,
            'examination' => $request->tos['examination'],
            'semester' => $request->tos['semester'],
            'college' => $request->tos['college'],
            'school_year' => $request->tos['school_year'],
            'subject_code' => $request->tos['subject_code'],
            'subject_description' => $request->tos['subject_description'],
            'total_no_of_hours' => $request->total_no_of_hours,
            'total_percent' => $request->total_percent,
            'total_remember' => $request->total_remember,
            'total_understand' => $request->total_understand,
            'total_apply' => $request->total_apply,
            'total_analyze' => $request->total_analyze,
            'total_evaluate' => $request->total_evaluate,
            'total_create' => $request->total_create,
            'total_total' => $request->total_total,
            'faculty' => $request->faculty,
            'chair_person' => $request->chair_person,
            'focal_person' => $request->focal_person,
            'college_department' => $request->college_department,
            'college_dean' => $request->college_dean
            ]
        );

        return compact('token');
    }  
}
