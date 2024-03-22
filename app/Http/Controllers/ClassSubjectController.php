<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Assign Subject List';
        $data['getRecord'] = ClassSubject::getRecord();

        return view('admin.class_subject.list', $data);
    }

    public function create()
    {
        $data['header_title'] = 'Assign Subject Add';
        $data['getClass'] = ClassSubject::getClass();
        $data['getSubject'] = ClassSubject::getSubject();

        return view('admin.class_subject.create', $data);
    }

    public function store(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $class_subject = new ClassSubject();
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = auth()->user()->id;
                    $class_subject->save();
                }
            }

            return redirect()->route('admin.assign_subject.index')->with('success', 'Subject Successfully Assign to Class');
        } else {
            return redirect()->back()->with('error', 'Due to some error pls try again');
        }
    }

    public function edit($id)
    {
        $getRecord = ClassSubject::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubject::getAssignSubjectID($getRecord->class_id);
            $data['header_title'] = 'Edit Assign Subject';
            $data['getClass'] = ClassSubject::getClass();
            $data['getSubject'] = ClassSubject::getSubject();

            return view('admin.class_subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        ClassSubject::deleteSubject($request->class_id);

        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $class_subject = new ClassSubject();
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = auth()->user()->id;
                    $class_subject->save();
                }
            }
        }
        return redirect()->route('admin.assign_subject.index')->with('success', 'Subject Successfully Assign to Class');
    }

    public function destroy($id)
    {
        $delete = ClassSubject::getSingle($id);
        $delete->is_delete = 1;
        $delete->save();

        return redirect()->back()->with('success', 'Record successfully deleted');
    }

    public function edit_single($id)
    {
        $getRecord = ClassSubject::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['header_title'] = 'Edit Assign Subject';
            $data['getClass'] = ClassSubject::getClass();
            $data['getSubject'] = ClassSubject::getSubject();

            return view('admin.class_subject.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function update_single($id, Request $request)
    {
            $class_subject = ClassSubject::getSingle($id);
            $class_subject->class_id = $request->class_id;
            $class_subject->subject_id = $request->subject_id;
            $class_subject->status = $request->status;
            $class_subject->save();

            return redirect()->route('admin.assign_subject.index')->with('success', 'Subject Successfully Assign to Class');
    }
}
