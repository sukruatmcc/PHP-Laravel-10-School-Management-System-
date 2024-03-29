<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Subject List';
        $data['getRecord'] = Subject::getRecord();
        return view('admin.subject.list', $data);
    }

    public function create()
    {
        $data['header_title'] = "Add New Class";
        return view('admin.subject.create',$data);
    }

    public function store(Request $request)
    {
        $class = new Subject;
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->type = trim($request->type);
        $class->created_by = auth()->user()->id;
        $class->save();

        return redirect()->route('admin.subject.index')->with('success','Subject successfully created');
    }

    public function edit($id)
    {
        $data['header_title'] = "Add New Admin";
        $data['getRecord'] = Subject::getSingle($id);

        if(!empty($data['getRecord']))
        {
            return view('admin.subject.edit',$data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $class = Subject::getSingle($id);
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->type = trim($request->type);
        $class->save();

        return redirect()->route('admin.subject.index')->with('success','Subject successfully updated');
    }

    public function destroy($id)
    {
        $class = Subject::getSingle($id);
        $class->is_delete = 1;
        $class->save();

        return redirect()->back()->with('success','Subject successfully deleted');
    }

    public function subjectMy()
    {
        $data['getRecord'] = ClassSubject::mySubject(auth()->user()->class_id);

        $data['header_title'] = 'My Subject';
        return view('student.my-subject', $data);
    }
}
