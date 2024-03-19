<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Class List';
        $data['getRecord'] = Clas::getRecord();
        return view('admin.class.list', $data);
    }

    public function create()
    {
        $data['header_title'] = "Add New Class";
        return view('admin.class.create',$data);
    }

    public function store(Request $request)
    {
        $class = new Clas;
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = auth()->user()->id;
        $class->save();

        return redirect()->route('admin.class.index')->with('success','Class successfully created');
    }

    public function edit($id)
    {
        $data['header_title'] = "Add New Admin";
        $data['getRecord'] = Clas::getSingle($id);

        if(!empty($data['getRecord']))
        {
            return view('admin.class.edit',$data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $class = Clas::getSingle($id);
        $class->name = $request->name;
        $class->status = $request->status;
        $class->save();

        return redirect()->route('admin.class.index')->with('success','Class successfully updated');
    }

    public function destroy($id)
    {
        $class = Clas::getSingle($id);
        $class->is_delete = 1;
        $class->save();

        return redirect()->back()->with('success','Class successfully deleted');
    }
}
