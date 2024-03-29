@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts.message')

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">My Student</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Profile Pic.</th>
                                            <th>Student Name</th>
                                            <th>Parent Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date Of Birth</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile Number</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $row)
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
                                                <td>{{ $row->parent_name }} {{ $row->parent_last_name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->admission_number }}</td>
                                                <td>{{ $row->class_name }}</td>
                                                <td>{{ $row->gender }}</td>
                                                <td>{{ date('d-m-Y H:i A',strtotime($row->date_of_birth)) }}</td>
                                                <td>{{ $row->caste }}</td>
                                                <td>{{ $row->religion }}</td>
                                                <td>{{ $row->mobile_number }}</td>
                                                <td>{{ date('d-m-Y H:i A',strtotime($row->admission_date)) }}</td>
                                                <td>{{ $row->blood_group }}</td>
                                                <td>{{ $row->height }}</td>
                                                <td>{{ $row->weight }}</td>
                                                <td>{{ date('d-m-Y H:i A',strtotime($row->created_at)) }}</td>
                                            </tr>
                                     @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px; float:right">
                                         {!! $getRecord->appends(request()->except('page'))->links() !!}
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
