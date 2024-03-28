@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Teacherr</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.teacher.store') }}" enctype="multipart/form-data">
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
                                            <label for="exampleInputEmail1">Martial Status</label>
                                            <input type="text" class="form-control" value="{{ old('martial_status') }}"
                                                name="martial_status" required placeholder="Martial Status">
                                                <div style="color: red">{{ $errors->first('martial_status') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option selected>Select Gender</option>
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
                                            <input type="date" class="form-control" value="{{ old('date_of_birth') }}"
                                                name="date_of_birth" required>
                                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Joining</label>
                                            <input type="date" class="form-control" value="{{ old('date_of_joining') }}"
                                                name="date_of_birth" required>
                                            <div style="color: red">{{ $errors->first('date_of_joining') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Current Address</label>
                                            <input type="text" class="form-control" value="{{ old('address') }}"
                                                name="adddress" placeholder="Current Address">
                                            <div style="color: red">{{ $errors->first('adddress') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Permanent Address</label>
                                            <input type="text" class="form-control" value="{{ old('parmanent_address') }}"
                                                name="parmanent_address" placeholder="Permanent Address">
                                            <div style="color: red">{{ $errors->first('parmanent_address') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ old('mobile_number') }}"
                                                name="mobile_number" placeholder="Mobile Number">
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
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
                                            <label for="exampleInputEmail1">Qualification</label>
                                            <input type="text" class="form-control" value="{{ old('quafilication') }}"
                                                name="quafilication" placeholder="Qualification">
                                            <div style="color: red">{{ $errors->first('quafilication') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Work Experience</label>
                                            <input type="text" class="form-control"
                                                name="work_experince" placeholder="Work Experince briefly..">
                                            <div style="color: red">{{ $errors->first('work_experince') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Note</label>
                                            <input type="text" class="form-control"
                                                name="note" placeholder="Note">
                                            <div style="color: red">{{ $errors->first('note') }}</div>
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
                                                name="email" required placeholder="Email">
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control" value="{{ old('password') }}"
                                                name="password" required placeholder="Password">
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
