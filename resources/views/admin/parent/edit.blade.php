@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Parent</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.parent.update',$getRecord->id) }}" enctype="multipart/form-data">
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
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ old('mobile_number',$getRecord->mobile_number) }}"
                                                name="mobile_number" required>
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Occupation</label>
                                            <input type="text" class="form-control" value="{{ old('occupation',$getRecord->occupation) }}"
                                                name="occupation" required>
                                            <div style="color: red">{{ $errors->first('occupation') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" value="{{ old('address',$getRecord->address) }}"
                                                name="address" required>
                                            <div style="color: red">{{ $errors->first('address') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option selected>Select Gender</option>
                                                <option {{ $getRecord->gender == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                                                <option {{ $getRecord->gender == 'Female' ? 'selected' : ''}}  value="Female">Female</option>
                                                <option {{ $getRecord->gender == 'Other' ? 'selected' : ''}}  value="Other">Other</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('gender') }}</div>
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
                                            <input type="text" class="form-control" name="password" placeholder="Password">
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
