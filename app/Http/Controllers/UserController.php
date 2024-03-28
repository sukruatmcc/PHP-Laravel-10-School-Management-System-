<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function myAccount()
    {
        $data['getRecord'] = User::getSingle(auth()->user()->id);
        $data['getClass'] = Clas::getRecord();
        $data['header_title'] = "My Account";

        if(auth()->user()->user_type == 2)
        {
            return view('teacher.my-account',$data);
        }
        elseif(auth()->user()->user_type == 3)
        {
            return view('student.my-account',$data);
        }
        elseif(auth()->user()->user_type == 4)
        {
            return view('parent.my-account',$data);
        }
        elseif(auth()->user()->user_type == 1)
        {
            return view('admin.my-account',$data);
        }

    }

    public function adminUpdateAccountMy(Request $request)
    {
        $id = auth()->user()->id;

        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Admin successfully updated');
    }

    public function updateAccountMy(Request $request)
    {
        $id = auth()->user()->id;

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->user_type = 2;
        $teacher->email = trim($request->email);

        if (!empty($request->password)) {
            $teacher->password = bcrypt($request->password);
        }

        $teacher->last_name = trim($request->last_name);
        $teacher->address = trim($request->address);
        $teacher->martial_status = trim($request->martial_status);
        $teacher->parmanent_address = trim($request->parmanent_address);
        $teacher->quafilication = trim($request->quafilication);
        $teacher->work_experince = trim($request->work_experince);
        $teacher->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth	 = trim($request->date_of_birth);
        }

        if (!empty($request->date_of_joining)) {
            $teacher->date_of_joining = trim($request->date_of_joining);
        }

        if(!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('profile_pic'),$filename);

            $teacher->profile_pic = $filename;
        }


        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->note = trim($request->note);
        $teacher->save();

        return redirect()->back()->with('success', 'Student succesfully updated');
    }

    public function studentUpdateMyAccount(Request $request)
    {
        $id = auth()->user()->id;

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->email = trim($request->email);

        if (!empty($request->password)) {
            $student->password = bcrypt($request->password);
        }

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
            $student->admission_date = trim(
                $request->admission_date);
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->save();

        return redirect()->route('student.my_account')->with('success', 'Student succesfully updated');
    }

    public function parentMyAccountUpdate(Request $request)
    {
        $id = auth()->user()->id;

        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->email = trim($request->email);

        if (!empty($request->password)) {
            $parent->password = bcrypt($request->password);
        }

        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->address = trim($request->address);
        $parent->occupation = trim($request->occupation);

        if(!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('profile_pic'),$filename);

            $parent->profile_pic = $filename;
        }

        $parent->mobile_number = trim($request->mobile_number);
        $parent->status = trim($request->status);
        $parent->save();

        return redirect()->back()->with('success', 'Parent succesfully updated');
    }

    public function changePassword()
    {
        $data['header_title'] = 'Change Password';

        return view('profile.change-password',$data);
    }

    public function changePasswordUpdate(Request $request)
    {
        $user = User::getSingle(auth()->user()->id);

        if(Hash::check($request->old_password,$user->password))
        {
             $user->password = Hash::make($request->new_password);
             $user->save();

            return redirect()->back()->with('success','Password successfully updated');
        }
        else
        {
            return redirect()->back()->with('error','Old Password is not Currect');
        }
    }
}
