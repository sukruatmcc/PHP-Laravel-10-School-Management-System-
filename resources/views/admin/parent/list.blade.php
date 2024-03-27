@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent List (Total : {{ $getParent == null ? 'No parent found' : $getParent->count() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ route('admin.parent.create') }}" class="btn btn-primary">Add New Parent</a>
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
                                        <h3 class="card-title">Search Parent</h3>
                                    </div>
                                    <form method="GET" action="">
                                        @csrf
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
                                                <label for="exampleInputEmail1">Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option {{ (request()->get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                    <option {{ (request()->get('gender') == 'Female') ? 'selected' : '' }}  value="Female">Female</option>
                                                    <option {{ (request()->get('gender') == 'Other') ? 'selected' : '' }}  value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Occupation</label>
                                                <input type="text" class="form-control" value="{{ request()->get('occupation') }}" name="occupation" placeholder="Occupation">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" class="form-control" value="{{ request()->get('address') }}" name="address" placeholder="Address">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                <input type="text" class="form-control" value="{{ request()->get('mobile_number') }}" name="mobile_number" placeholder="Mobile Number">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Created Date</label>
                                                <input type="date" class="form-control" value="{{ request()->get('date') }}" name="date">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 32px">Search</button>
                                                <a href="{{ route('admin.parent.index') }}"  class="btn btn-success" style="margin-top: 32px">Reset</a>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                            </div>
                        @include('admin.layouts.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Parent List</h3>
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
                                            <th>Mobile Number</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                             @foreach ($getParent as $row)
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
                                                        <td>{{ $row->mobile_number }}</td>
                                                        <td>{{ $row->occupation }}</td>
                                                        <td>{{ $row->address }}</td>
                                                        <td>{{ $row->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                        <td>{{ date('d-m-Y H:i A',strtotime($row->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.parent.edit', $row->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <a href="{{ route('admin.parent.destroy', $row->id) }}"
                                                                class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                             @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    {!! $getParent->appends(request()->except('page'))->links() !!}
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
