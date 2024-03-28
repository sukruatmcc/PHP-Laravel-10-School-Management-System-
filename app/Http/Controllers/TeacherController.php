<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Teacher List';
        $data['getTeacher'] = User::getTeacher();

        return view('admin.teacher.list', $data);
    }

    public function create()
    {
        $data['header_title'] = 'Teacher Add';

        return view('admin.teacher.create', $data);
    }

    public function store(Request $request)
    {
            $student = new User;
            $student->name = trim($request->name);
            $student->user_type = 2;
            $student->email = trim($request->email);
            $student->password = bcrypt($request->password);
            $student->last_name = trim($request->last_name);
            $student->address = trim($request->address);
            $student->martial_status = trim($request->martial_status);
            $student->parmanent_address = trim($request->parmanent_address);
            $student->quafilication = trim($request->quafilication);
            $student->work_experince = trim($request->work_experince);
            $student->gender = trim($request->gender);

            if (!empty($request->date_of_birth)) {
                $student->date_of_birth	 = trim($request->date_of_birth);
            }

            if (!empty($request->date_of_joining)) {
                $student->date_of_joining = trim($request->date_of_joining);
            }

            if(!empty($request->file('profile_pic'))) {
                $ext = $request->file('profile_pic')->getClientOriginalExtension();
                $file = $request->file('profile_pic');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr).'.'.$ext;
                $file->move(public_path('profile_pic'),$filename);

                $student->profile_pic = $filename;
            }


            $student->mobile_number = trim($request->mobile_number);
            $student->note = trim($request->note);
            $student->status = trim($request->status);
            $student->save();

            return redirect()->route('admin.teacher.index')->with('success', 'Student succesfully created');
    }

    public function edit($id)
    {
        $data['header_title'] = "Edit Teacher";
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord']))
        {
            return view('admin.teacher.edit',$data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->user_type = 2;
        $student->email = trim($request->email);
        $student->password = bcrypt($request->password);
        $student->last_name = trim($request->last_name);
        $student->address = trim($request->address);
        $student->martial_status = trim($request->martial_status);
        $student->parmanent_address = trim($request->parmanent_address);
        $student->quafilication = trim($request->quafilication);
        $student->work_experince = trim($request->work_experince);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth	 = trim($request->date_of_birth);
        }

        if (!empty($request->date_of_joining)) {
            $student->date_of_joining = trim($request->date_of_joining);
        }

        if(!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('profile_pic'),$filename);

            $student->profile_pic = $filename;
        }


        $student->mobile_number = trim($request->mobile_number);
        $student->note = trim($request->note);
        $student->status = trim($request->status);
        $student->save();

        return redirect()->route('admin.teacher.index')->with('success', 'Student succesfully updated');
    }

    public function destroy($id)
    {
        $delete = User::getSingle($id);
        $delete->is_delete = 1;
        $delete->save();

        return redirect()->back()->with('success', 'Record successfully deleted');
    }
}
