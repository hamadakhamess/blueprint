@extends('layouts.app')
@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" class='row' action="{{ route('admin.users.update',$one->id) }}" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @csrf

                    <div class="form-group col-sm-12">
                        <label>name</label>
                        <input value="{{ $one->name }}" name="name" type="text" class="form-control" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <label>email</label>
                        <input  value="{{ $one->email }}" name="email" type="email" class="form-control" required>



                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror



                    </div>







                    <div class="form-group col-lg-3 col-sm-12">
                        <label>role</label>
                        <select name="role" type="password" class="form-control" required>
                            @foreach($roles as $role)
                                <option value="{{$role['name']}}">{{$role['name']}}</option>
                            @endforeach
                        </select>

                        @error('role')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror


                    </div>

                    <div class="form-group col-sm-12">
                        <label>password</label>
                        <input  name="password" type="password" class="form-control">
                    </div>

                    <div class="form-group col-sm-12">
                        <label>password_confirmation</label>
                        <input name="password_confirmation" type="password" class="form-control">

                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>



                    <div class="w-100 py-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>


@endsection
@section('scripts')
    <script src="{{asset('assets/dist/js/admin/roles.js')}}"></script>
@endsection
