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
                <form method="POST" class='row' action="{{ route('admin.roles.update',$one->id) }}" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @csrf

                    <div class="form-group col-sm-12">
                        <label>name</label>
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control" required>
                    </div>


                    @php
                       $models =['users','roles'];
                       $maps = ['read','create', 'update', 'delete'];
                    @endphp
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-50">
                            <div class="pd-100 card-box">
                                <h5 class="h4 text-blue mb-100">permissions</h5>
                                <div class="tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach($models as $model)
                                            <li class="nav-item">
                                                <a class="nav-link text-blue" data-toggle="tab" href="#{{ $model }}" role="tab" aria-selected="false">@lang('dashboard.'.$model)</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach ($models as $index=>$model)
                                            <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}" role="tabpanel">
                                                <div class="pd-20">

                                                    <label><input type="checkbox" id="cb{{ $model }}" class="check-all" >@lang('dashboard.check_all')</label> <br>

                                                    @foreach ($maps as $map)
                                                        <label><input type="checkbox" class="cb{{ $model }}" name="permissions[]" value="{{ $map . '-' . $model }}">@lang('dashboard.'.$map)</label> <br>
                                                    @endforeach
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{asset('assets/dist/js/admin/users.js')}}"></script>
    <script>
        $(document).on('change', '.check-all', function () {
            var id=$(this).attr('id');
            console.log(id);
            if ($(this).prop('checked')) {
                $('.'+id).prop('checked', true)
            } else {
                $('.'+id).prop('checked', false);
            }
        });

    </script>
@endsection
