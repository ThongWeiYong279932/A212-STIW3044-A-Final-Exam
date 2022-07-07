<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tutor; 
use App\Models\Subject;
use Illuminate\Support\Facades\Auth; 


class SubjectController extends Controller
{
    //
    public function registerSubject(Request $request) 
    { 
        echo json_encode($request->all()); 
        $newSubject = new Subject(); 
        $newSubject->id = $request->id; 
        $newSubject->title = $request->title; 
        $newSubject->description = $request->description;
        $newSubject->price = $request->price;
        $newSubject->learningHour = $request->learningHour; 
        $newSubject->is_complete = 0; 
        $newSubject->save(); 
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed'); 
    } 

    public function mainpage() 
    { 
      if (Auth::check()) { 
        return view('mainpage', ['subjects' => Subject::all()]); 
     }
        return redirect("login")->withSuccess('You do not have access'); 
    } 

}
