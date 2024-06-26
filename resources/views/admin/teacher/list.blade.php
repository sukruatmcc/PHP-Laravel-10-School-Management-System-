@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teacher List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ route('admin.teacher.create') }}" class="btn btn-primary">Add New Teacher</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Search Student</h3>
                                    </div>
                                    <form method="GET" action="">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" value="{{ request()->get('name') }}" name="name" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input type="text" class="form-control" value="{{ request()->get('last_name') }}" name="last_name" placeholder="Last Name">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" value="{{ request()->get('email') }}" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Current Address</label>
                                                <input type="text" class="form-control" value="{{ request()->get('current_address') }}" name="current_address" placeholder="Roll Number">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Parmanent Address</label>
                                                <input type="text" class="form-control" value="{{ request()->get('parmanent_address') }}" name="parmanent_address" placeholder="Parmanent Address">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Martial Status</label>
                                                <input type="text" class="form-control" value="{{ request()->get('martial_status') }}" name="martial_status" placeholder="Martial Status">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Gender</label>
                                                <select class="form-control" name="gender" required>
                                                    <option selected>Select Gender</option>
                                                    <option {{ (request()->get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                    <option {{ (request()->get('gender') == 'Female') ? 'selected' : '' }}  value="Female">Female</option>
                                                    <option {{ (request()->get('gender') == 'Other') ? 'selected' : '' }}  value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                <input type="text" class="form-control" value="{{ request()->get('mobile_number') }}" name="mobile_number" placeholder="Mobile Number">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Quafilication</label>
                                                <input type="text" class="form-control" value="{{ request()->get('quafilication') }}" name="quafilication" placeholder="Quafilication">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select class="form-control" name="status" >
                                                    <option value="">Select Status</option>
                                                    <option {{ (request()->get('status') == 100) ? 'selected' : '' }} value="100">Active</option>
                                                    <option {{ (request()->get('status') == 1) ? 'selected' : '' }}  value="1">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Date of Joining</label>
                                                <input type="date" class="form-control" value="{{ request()->get('date_of_joining') }}" name="date_of_joining">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Created Date</label>
                                                <input type="date" class="form-control" value="{{ request()->get('date') }}" name="date">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 32px">Search</button>
                                                <a href="{{ route('admin.teacher.index') }}"  class="btn btn-success" style="margin-top: 32px">Reset</a>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                            </div>
                        @include('admin.layouts.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Teacher List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date Of Birth</th>
                                            <th>Date Of Joining</th>
                                            <th>Mobile Number</th>
                                            <th>Martial Status</th>
                                            <th>Current Address</th>
                                            <th>Permanent Address</th>
                                            <th>Quafilication</th>
                                            <th>Work Experience</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                             @foreach ($getTeacher as $row)
                                                    <tr>
                                                        <td>{{ $row->id }}</td>
                                                        <td>
                                                            @if(!empty($row->profile_pic))
                                                            <img src="{{ asset('profile_pic/'.$row->profile_pic) }}" style="height: 50px; width:50%; border-radius: 50%" alt="{{ $row->name }}">
                                                            @else
                                                            <img src="{{ asset('profile_pic/dummy-user.png') }}" style="height: 50px; width:50%; border-radius: 50%" alt="{{ $row->name }}">
                                                            @endif
                                                        </td>
                                                        <td>{{ $row->name }} {{ $row->last_name }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->gender }}</td>
                                                        <td>{{ date('d-m-Y H:i A',strtotime($row->date_of_birth)) }}</td>
                                                        <td>{{ date('d-m-Y H:i A',strtotime($row->date_of_joining)) }}</td>
                                                        <td>{{ $row->mobile_number }}</td>
                                                        <td>{{ $row->martial_status }}</td>
                                                        <td>{{ $row->address }}</td>
                                                        <td>{{ $row->parmanent_address }}</td>
                                                        <td>{{ $row->quafilication }}</td>
                                                        <td>{{ $row->work_experince }}</td>
                                                        <td>{{ $row->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                        <td>{{ date('d-m-Y H:i A',strtotime($row->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.teacher.edit', $row->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <a href="{{ route('admin.teacher.destroy', $row->id) }}"
                                                                class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                             @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    {!! $getTeacher->appends(request()->except('page'))->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
