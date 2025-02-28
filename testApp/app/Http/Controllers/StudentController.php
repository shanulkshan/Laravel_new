<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends controller{
    public function index(){
        return view('Student.index');
    }
    public function create(){
        return view('Student.create');
    }
    public function store(Request $request){

        $rules = [
            'first_name' => 'required|string',
            'address' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //method 1

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->contact_no = $request->contact_no;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->save();

        //method 2

        // $student = Student::create($request->all());

        return "Student record created successfully";
    }
}
