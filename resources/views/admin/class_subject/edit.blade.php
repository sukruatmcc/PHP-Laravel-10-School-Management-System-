@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Assign Subject</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.assign_subject.update',$getRecord->id) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <select class="form-control" name="class_id" required>
                                            <option selected>Select Class</option>
                                            @foreach ($getClass as $row)
                                            <option {{ $getRecord->class_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                       @foreach ($getSubject as $row)
                                       @php
                                         $checked = "";
                                       @endphp
                                       @foreach ($getAssignSubjectID as $subjectAssign)
                                            @if($subjectAssign->subject_id = $row->id)
                                            @php
                                            $checked = "checked";
                                          @endphp
                                            @endif
                                       @endforeach
                                       <div>
                                        <label  style="font-weight: normal">
                                            <input {{ $checked }} type="checkbox" value="{{ $row->id }}" name="subject_id[]"/> {{ $row->name }}
                                          </label>
                                       </div>
                                       @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option  {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Active</option>
                                            <option  {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
