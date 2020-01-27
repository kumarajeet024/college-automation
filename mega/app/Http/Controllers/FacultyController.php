<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\faculty;
use App\User;
use App\branches;
use Exception;
class FacultyController extends controller
{
    private function make($department){
     $exist=branches::findOrFail($department);
     if(!$exist)
     return false; 
     $result=faculty::where('department',$department)->count();
      return $department."".$result; 
       }

    protected function create(Request $request){
       
        $validator=Validator::make($request->all(),[
           'email'=>'required|unique:faculties|60',
           'contact'=>'required|unique:faculties|10',
           'department'=>'required|string',
           'name'=>'required|string'    
       ])->validate();
       
       $user_id=make($request['department']);
       if(!$user_id)
       return redirect()->withErrors($err,"Department Invalid");
       
       $request['user_id']=$user_id;
       $faculty=faculty::create($request->all());
       $user= User::create([
        'user_id'=>$user_id,
        'email'=>$request['email'],
        'password'=>$request['contact'],
        'roll'=>'Faculty',
       ]);

       if($user&& $faculty)
       return redirect()->with('Verdict','Faculty Created!');
       
       if(!$faculty||!$user)
       return redirect()->withErrors($error,"Something Went Wrong");
    }
   protected function register(Request $request){
    $validator=Validator::make($request->all(),[
        'email'=>'required|unique:faculties|60',
        'contact'=>'required|unique:faculties|10',
        'department'=>'required|string',
        'name'=>'required|string'    
    ])->validate();
    try{
        $user_id=make($request['department']);
        
        if(!$user_id)
        throw new Exception("Department Invalid");

        $request['user_id']=$user_id;
        $faculty=faculty::create($request->all());
        $user= User::create([
         'user_id'=>$user_id,
         'email'=>$request['email'],
         'password'=>$request['contact'],
         'roll'=>'Faculty',
        ]);
    }
    catch(Exception $e){
     return redirect()->withErrors($errors,$e->getmessage())->withInput();
    }
   }
}
