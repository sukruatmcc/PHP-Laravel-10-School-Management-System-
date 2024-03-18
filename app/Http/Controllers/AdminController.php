<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['header_title'] = "Admin List";
        $data['getRecord'] = User::getAdmin();

        return view('admin.admin.list', $data);
    }

    public function create()
    {
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = bcrypt(trim($request->password));
        $user->user_type = 1;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Admin successfully created');
    }

    public function edit($id)
    {
        $data['header_title'] = "Add New Admin";
        $data['getRecord'] = User::getSingle($id);

        if (!empty($data['getRecord'])) {
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
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

        return redirect()->route('admin.index')->with('success', 'Admin successfully updated');
    }

    public function destroy($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success','Admin successfully updated');
    }
}
