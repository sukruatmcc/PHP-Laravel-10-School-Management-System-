@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ route('admin.create') }}" class="btn btn-primary">Add New Admin</a>
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
                                        <h3 class="card-title"> Search Admin</h3>
                                    </div>
                                    <form method="GET" action="">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" value="{{ request()->get('name') }}" name="name" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" value="{{ request()->get('email') }}" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputEmail1">Date</label>
                                                <input type="date" class="form-control" value="{{ request()->get('date') }}" name="date">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 32px">Search</button>
                                                <a href="{{ route('admin.index') }}"  class="btn btn-success" style="margin-top: 32px">Reset</a>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                            </div>

                        @include('admin.layouts.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ date('d-m-Y H:i A',strtotime($row->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit', $row->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin.destroy', $row->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right">
                                    {!! $getRecord->appends(request()->except('page'))->links() !!}
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
