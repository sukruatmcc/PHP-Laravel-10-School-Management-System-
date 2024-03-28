<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function myAccount()
    {
        $data['getRecord'] = User::getSingle(auth()->user()->id);
        $data['header_title'] = "My Account";

        return view('teacher.my-account',$data);
    }

    public function updateAccountMy(Request $request)
    {
        $id = auth()->user()->id;

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->user_type = 2;
        $student->email = trim($request->email);

        if (!empty($request->password)) {
            $student->password = bcrypt($request->password);
        }

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
        $student->save();

        return redirect()->back()->with('success', 'Student succesfully updated');
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
