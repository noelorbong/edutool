<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class QuestionController extends Controller
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

    public function questionPdf($token){

        $user = auth()->user();
        $test_data = DB::table('test_questions')
            ->select('*')
            ->where('token', '=', $token)
            ->where('user_id','=',$user->id)
            ->first();

        $array_question = explode(",",$test_data->questions);

        $questions = DB::table('questions')
            ->select('*')
            ->where('user_id','=',$user->id)
            ->whereIn('id', $array_question)
            ->get();
        
        return view('testpdf',compact('test_data','questions'));
    }

    public function questionPdfAnswer($token){
        $user = auth()->user();
        $test_data = DB::table('test_questions')
            ->select('*')
            ->where('token', '=', $token)
            ->where('user_id','=',$user->id)
            ->first();
        $array_question = explode(",",$test_data->questions);

        $questions = DB::table('questions')
            ->select('*')
            ->whereIn('id', $array_question)
            ->where('user_id','=',$user->id)
            ->get();
        
        return view('testpdfanswer',compact('test_data','questions'));
    }

    

    public function upLoadImage(Request $request)
    {
        if($request->file('photo')){
            $photo = $request->filename;
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put( $photo.'.png',  File::get($cover));
        }
        return 'success';
    }

    public function questions()
    {
        $user = auth()->user();
        $records = DB::table('questions')
        ->select('*')
        ->where('user_id','=',$user->id)
        ->orderByRaw('id asc')
        ->get();

        return  compact('records');
    }

     public function dropdowns()
    {
        $user = auth()->user();
        $subjects = DB::table('questions')
        ->select('subject_code')
        ->orderByRaw('subject_code asc')
        ->where('user_id','=',$user->id)
        ->distinct()
        ->get();

        $chapters = DB::table('questions')
        ->select('chapter','subject_code')
        ->orderByRaw('chapter asc')
        ->where('user_id','=',$user->id)
        ->distinct()
        ->get();

        $levels = DB::table('questions')
        ->select('chapter','subject_code','level')
        ->orderByRaw('level asc')
        ->where('user_id','=',$user->id)
        ->distinct()
        ->get();

        return  compact('subjects','chapters','levels');
    }

    public function countAvailable($subject_code,$chapter,$level)
    {
        $user = auth()->user();
        $available_count = DB::table('questions')
        ->where('chapter','=',$chapter)
        ->where('subject_code','=',$subject_code)
        ->where('level','=',$level)
        ->where('user_id','=',$user->id)
        ->count();
        
        return  compact('available_count');
    }

    public function getRequired($subject_code,$chapter,$level,$required_question,$questions_id)
    {
        $user = auth()->user();
        $questions_id_array = explode (",", $questions_id); 
        $records = DB::table('questions')
        ->select('*')
        ->where('chapter','=',$chapter)
        ->where('subject_code','=',$subject_code)
        ->where('level','=',$level)
        ->where('user_id','=',$user->id)
        ->whereNotIn('id',$questions_id_array)
        ->orderByRaw('id asc')
        ->limit($required_question)
        ->get();

        return  compact('records');
    }

    public function edit($id)
    {
        $record = DB::table('questions')
        ->select('*')
        ->orderByRaw('id asc')
        ->where('id','=',$id)
        ->first();

        return  compact('record');
    }

    public function createTest()
    {
        return view('createtest');
    }

    public function showQuestion()
    {
        return view('showquestion');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        
        DB::table('questions')->insert(
            [
                    'user_id' =>  $user->id,
                    'question' => $request->question,
                    'choices_a' => $request->choices_a,
                    'choices_b' => $request->choices_b,
                    'choices_c' => $request->choices_c,
                    'choices_d' => $request->choices_d,
                    'answer' => $request->answer,
                    'subject_code' => $request->subject_code,
                    'subject_description' => $request->subject_description,
                    'chapter' => $request->chapter,
                    'level' => $request->level
            ]
        );
        return 'success';
    }
    
    public function storeTest(Request $request)
    {
        $user = auth()->user();
        $token = str_random(25);
        
        DB::table('test_questions')->insert(
            [
                'user_id' =>  $user->id,
                'token' => $token,
                'questions' => $request->questions,
                'type_of_exam' => $request->examination,
                'subject_code' => $request->subject_code,
                'subject_description' => $request->subject_description,
                'semester' => $request->semester,
                'school_year' => $request->school_year,
                'general_instructions' => $request->general_instruction
            ]
        );
        return compact('token');
    } 

    public function update(Request $request)
    {
        DB::table('questions')
        ->where('id','=',$request->id)
        ->update(
            [
                    'question' => $request->question,
                    'choices_a' => $request->choices_a,
                    'choices_b' => $request->choices_b,
                    'choices_c' => $request->choices_c,
                    'choices_d' => $request->choices_d,
                    'answer' => $request->answer,
                    'subject_code' => $request->subject_code,
                    'subject_description' => $request->subject_description,
                    'chapter' => $request->chapter,
                    'level' => $request->level
            ]
        );
        return 'success';
    } 

     public function delete(Request $request)
    {
        DB::table('questions')->where('id', '=', $request->id)->delete();

        return 'success';
    }
}
