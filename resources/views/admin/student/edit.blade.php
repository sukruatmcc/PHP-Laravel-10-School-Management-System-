@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Student</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.student.update',$getRecord->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group-col-md-12">
                                                <label for="exampleInputEmail1">Profile Pic</label><br>
                                                @if(!empty($getRecord->profile_pic))
                                                    <img src="{{ asset('profile_pic/'.$getRecord->profile_pic) }}" style="width: 100px" alt="{{ $getRecord->name }}">
                                                @endif

                                                @if(empty($getRecord->profile_pic))
                                                    <img src="{{ asset('profile_pic/dummy-user.png') }}" style="width: 100px" alt="{{ $getRecord->name }}">
                                                @endif<br><br>

                                                <input type="file" class="form-control"
                                                    name="profile_pic">
                                                <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" class="form-control" value="{{ old('name',$getRecord->name) }}"
                                                name="name" required placeholder="First Name">
                                                <div style="color: red">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" class="form-control" value="{{ old('last_name',$getRecord->last_name) }}"
                                                name="last_name" required placeholder="Last Name">
                                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Admission Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('admission_number',$getRecord->admission_number) }}" name="admission_number" required
                                                placeholder="Admission Number">
                                                <div style="color: red">{{ $errors->first('admission_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Roll Number</label>
                                            <input type="text" class="form-control" value="{{ old('roll_number',$getRecord->roll_number) }}"
                                                name="roll_number" required placeholder="Roll Number">
                                                <div style="color: red">{{ $errors->first('roll_number') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id" required>
                                                <option selected>Select Class</option>
                                                @foreach ($getClass as $row)
                                                    <option {{ $row->id == $getRecord->class_id ? 'selected' : '' }}  value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: red">{{ $errors->first('class_id') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option selected>Select Class</option>
                                                <option {{ $getRecord->gender == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                                                <option {{ $getRecord->gender == 'Female' ? 'selected' : ''}}  value="Female">Female</option>
                                                <option {{ $getRecord->gender == 'Other' ? 'selected' : ''}}  value="Other">Other</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('gender') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" value="{{ old('date',$getRecord->date_of_birth) }}"
                                                name="date_of_birth" required>
                                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Caste</label>
                                            <input type="text" class="form-control" value="{{ old('caste',$getRecord->caste) }}"
                                                name="caste" required placeholder="Caste">
                                            <div style="color: red">{{ $errors->first('caste') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Religion</label>
                                            <input type="text" class="form-control" value="{{ old('religion',$getRecord->religion) }}"
                                                name="religion" required>
                                            <div style="color: red">{{ $errors->first('religion') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ old('mobile_number',$getRecord->mobile_number) }}"
                                                name="mobile_number" required>
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Admission Date</label>
                                            <input type="date" class="form-control" value="{{ old('admission_date',$getRecord->admission_date) }}"
                                                name="admission_date" required>
                                            <div style="color: red">{{ $errors->first('admission_date') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Blood Group</label>
                                            <input type="text" class="form-control" value="{{ old('blood_group',$getRecord->blood_group) }}"
                                                name="blood_group" required>
                                            <div style="color: red">{{ $errors->first('blood_group') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Height</label>
                                            <input type="text" class="form-control" value="{{ old('height',$getRecord->height) }}"
                                                name="height" required>
                                            <div style="color: red">{{ $errors->first('height') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Weight</label>
                                            <input type="text" class="form-control" value="{{ old('weight',$getRecord->weight) }}"
                                                name="weight" required>
                                            <div style="color: red">{{ $errors->first('weight') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('status') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" value="{{ old('email',$getRecord->email) }}"
                                                name="email" required>
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="test" class="form-control" name="password" placeholder="Password">
                                            <p>Due you want to change password so Please add new password</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
