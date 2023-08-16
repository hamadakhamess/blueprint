@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
{{--                <h3 class="card-title">DataTable with minimal features & hover style</h3>--}}
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
