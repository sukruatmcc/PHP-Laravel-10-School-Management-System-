@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts.message')
                        <div class="card card-primary">
                            <form method="POST" @if(auth()->user()->user_type == 1) action="{{ route('change_password.update') }}" @elseif(auth()->user()->user_type == 2) action="{{ route('teacher.change_password.update') }}"
                                @elseif(auth()->user()->user_type == 3) action="{{ route('student.change_password.update') }}" @elseif(auth()->user()->user_type == 4) action="{{ route('parent.change_password.update') }}" @endif>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Old Password</label>
                                        <input type="password" class="form-control" name="old_password" required placeholder="Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input type="password" class="form-control" name="new_password" required placeholder="New Password">
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
