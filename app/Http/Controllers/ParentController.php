<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Parent List';
        $data['getParent'] = User::getParent();

        return view('admin.parent.list', $data);
    }

    public function create()
    {
        $data['header_title'] = 'Parent Add';

        return view('admin.parent.create', $data);
    }

    public function store(Request $request)
    {
            request()->validate(([
                'name' => 'max:50',
                'email' => 'required|email|unique:users',
                'occupation' => 'max:255',
                'mobile_number' => 'max:15,min:8',
            ]));

            $student = new User;
            $student->name = trim($request->name);
            $student->user_type = 4;
            $student->email = trim($request->email);
            $student->password = bcrypt($request->password);
            $student->last_name = trim($request->last_name);
            $student->mobile_number = trim($request->mobile_number);
            $student->gender = trim($request->gender);
            $student->occupation = trim($request->occupation);
            $student->address = trim($request->address);

            if(!empty($request->file('profile_pic'))) {
                $ext = $request->file('profile_pic')->getClientOriginalExtension();
                $file = $request->file('profile_pic');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr).'.'.$ext;
                $file->move(public_path('profile_pic'),$filename);

                $student->profile_pic = $filename;
            }

            $student->status = trim($request->status);
            $student->save();

            return redirect()->route('admin.parent.index')->with('success', 'Parent succesfully created');
    }

    public function edit($id)
    {
        $data['header_title'] = "Add New Admin";
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord']))
        {
            return view('admin.parent.edit',$data);
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
        $student->email = trim($request->email);

        if (!empty($request->password)) {
            $student->password = bcrypt($request->password);
        }

        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->address = trim($request->address);
        $student->occupation = trim($request->occupation);

        if(!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('profile_pic'),$filename);

            $student->profile_pic = $filename;
        }

        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->save();

        return redirect()->route('admin.parent.index')->with('success', 'Parent succesfully updated');
    }

    public function destroy($id)
    {
        $delete = User::getSingle($id);
        $delete->is_delete = 1;
        $delete->save();

        return redirect()->back()->with('success', 'Record successfully deleted');
    }

    public function myStudent($id)
    {
        $data['parentID'] = $id;
        $data['header_title'] = 'Parent Student List';
        $data['getParent'] = User::getSingle($id);
        $data['getRecord'] = User::getMyStudent($id);
        $data['getSearchStudent'] = User::getSearchStudent();

       return view('admin.parent.my-student',$data);
    }

    public function parentMyStudent()
    {
        $id = auth()->user()->id;
        $data['header_title'] = 'Parent Student List';
        $data['getRecord'] = User::getMyStudent($id);

       return view('parent.my-student',$data);
    }

    public function assignStudentParent($student_id,$parentID)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parentID;
        $student->save();

        return redirect()->back()->with('success', 'Student successfully Assign');
    }

    public function studentParentDestroy($student_id)
    {
        $student = User::getSingle($student_id);
        if ($student->parent_id !== null) {
            $student->parent_id = null;
        }
        $student->save();

        return redirect()->back()->with('success', 'Student successfully Assign Deleted');
    }
}
