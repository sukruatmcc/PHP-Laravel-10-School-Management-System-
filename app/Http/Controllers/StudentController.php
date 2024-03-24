<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Student List';
        $data['getStudent'] = User::getStudent();

        return view('admin.student.list', $data);
    }

    public function create()
    {
        $data['header_title'] = 'Student List';
        $data['getClass'] = Clas::getRecord();

        return view('admin.student.create', $data);
    }

    public function store(Request $request)
    {
            request()->validate(([
                'email' => 'required|email|unique:users',
                'class_id' => 'required',
                'weight' => 'max:10',
                'blood_group' => 'max:10',
                'mobile_number' => 'max:15,min:8',
                'admissions_number' => 'max:50',
                'roll_number' => 'max:50',
                'caste' => 'max:50',
                'height' => 'max:10'
            ]));

            $student = new User;
            $student->name = trim($request->name);
            $student->user_type = 3;
            $student->email = trim($request->email);
            $student->password = bcrypt($request->password);
            $student->last_name = trim($request->last_name);
            $student->admission_number = trim($request->admission_number);
            $student->roll_number = trim($request->roll_number);
            $student->class_id = trim($request->class_id);
            $student->gender = trim($request->gender);

            if (!empty($request->date_of_birth)) {
                $student->date_of_birth	 = trim($request->date_of_birth);
            }


            if(!empty($request->file('profile_pic'))) {
                $ext = $request->file('profile_pic')->getClientOriginalExtension();
                $file = $request->file('profile_pic');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr).'.'.$ext;
                $file->move(public_path('profile_pic'),$filename);

                $student->profile_pic = $filename;
            }


            $student->caste = trim($request->caste);
            $student->religion = trim($request->religion);
            $student->mobile_number = trim($request->mobile_number);

            if (!empty($request->admission_date)) {
                $student->admission_date = trim($request->admission_date);
            }

            $student->blood_group = trim($request->blood_group);
            $student->height = trim($request->height);
            $student->weight = trim($request->weight);
            $student->status = trim($request->status);
            $student->save();

            return redirect()->route('admin.student.index')->with('success', 'Student succesfully created');
    }
}
