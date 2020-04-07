@extends('admin.app')
@section('service-main-li','menu-open')
@section('service-active-add','active')
@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 37px;
            user-select: none;
            -webkit-user-select: none;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Service</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Service</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container">
            @if ($message = Session::get('success'))
                <br>
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                <br>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <form action="{{route('adminService.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Provider type</label>
                                        <select class="form-control" name="provider_type">
                                            <option selected disabled>Select Provider</option>
                                            <option value="government">Government</option>
                                            <option value="private">Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Service Type</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                                data-placeholder="Select Your City"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" name="cat_id">
                                            <option selected disabled>Select Service</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Your District</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                                data-placeholder="Select Your City"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" name="d_id"
                                                id="district" onchange="cityfilter(this.value)">
                                            <option selected disabled>Select District</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->d_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Your City</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                                data-placeholder="Select Your City"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" name="c_id"
                                                id="city">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">(Company / Your) Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                               autocomplete="off" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Phone Number</label>
                                        <input type="tel" class="form-control" id="exampleFormControlInput1"
                                               autocomplete="off" name="phone">
                                    </div>
                                </div>
                                {{--                        <div class="col-md-6">--}}
                                {{--                            <div class="form-group">--}}
                                {{--                                <label for="exampleFormControlFile1">Company Logo(Optional)</label>--}}
                                {{--                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}

                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Add New Service</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('jsFooter')
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
        function cityfilter(id){
            var d_id =id  ;

            if(d_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-city-list')}}?d_id="+d_id,
                    success:function(res){
                        if(res){
                            $("#city").empty();
                            $.each(res,function(key,value){
                                $("#city").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#city").empty();
                        }
                    }
                });
            }else{
                $("#city").empty();
            }

        };
    </script>


    <!-- Select2 -->
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
@endsection
