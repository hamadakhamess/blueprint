@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.users.create')}}" class="btn btn-primary">Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover dataTable w-100" id="kt_datatables_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>created_at</th>
                        <th>actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/dist/js/admin/users.js')}}"></script>
@endsection
