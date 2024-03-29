@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Student</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.student.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" class="form-control" value="{{ old('name') }}"
                                                name="name" required placeholder="First Name">
                                                <div style="color: red">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" class="form-control" value="{{ old('last_name') }}"
                                                name="last_name" required placeholder="Last Name">
                                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Admission Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('admission_number') }}" name="admission_number" required
                                                placeholder="Admission Number">
                                                <div style="color: red">{{ $errors->first('admission_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Roll Number</label>
                                            <input type="text" class="form-control" value="{{ old('roll_number') }}"
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
                                                    <option {{ (old('class_id') == $row->id) ? 'selected' : '' }}  value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: red">{{ $errors->first('class_id') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option selected>Select Class</option>
                                                <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                <option {{ (old('gender') == 'Female') ? 'selected' : '' }}  value="Female">Female</option>
                                                <option {{ (old('gender') == 'Other') ? 'selected' : '' }}  value="Other">Other</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('gender') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" value="{{ old('date') }}"
                                                name="date_of_birth" required>
                                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Caste</label>
                                            <input type="text" class="form-control" value="{{ old('caste') }}"
                                                name="caste" required placeholder="Caste">
                                            <div style="color: red">{{ $errors->first('caste') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Religion</label>
                                            <input type="text" class="form-control" value="{{ old('religion') }}"
                                                name="religion" required>
                                            <div style="color: red">{{ $errors->first('religion') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ old('mobile_number') }}"
                                                name="mobile_number" required>
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Admission Date</label>
                                            <input type="date" class="form-control" value="{{ old('admission_date') }}"
                                                name="admission_date" required>
                                            <div style="color: red">{{ $errors->first('admission_date') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Profile Pic</label>
                                            <input type="file" class="form-control"
                                                name="profile_pic">
                                            <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Blood Group</label>
                                            <input type="text" class="form-control" value="{{ old('blood_group') }}"
                                                name="blood_group" required>
                                            <div style="color: red">{{ $errors->first('blood_group') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Height</label>
                                            <input type="text" class="form-control" value="{{ old('height') }}"
                                                name="height" required>
                                            <div style="color: red">{{ $errors->first('height') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Weight</label>
                                            <input type="text" class="form-control" value="{{ old('weight') }}"
                                                name="weight" required>
                                            <div style="color: red">{{ $errors->first('weight') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('status') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" value="{{ old('email') }}"
                                                name="email" required>
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control" value="{{ old('password') }}"
                                                name="password" required>
                                            <div style="color: red">{{ $errors->first('password') }}</div>
                                        </div>
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
