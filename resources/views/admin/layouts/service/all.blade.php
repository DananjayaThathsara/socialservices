@extends('admin.app')
@section('service-main-li','menu-open')
@section('service-active-all','active')
@section('head')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Services - <a href="{{route('adminService.create')}}" class="btn btn-primary">Add New</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Services</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <!-- Small boxes (Stat box) -->
            <div class="row">
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
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Category</th>
                            <th>Place</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$service->category->cat_name}}</td>
                            <td>{{$service->city->c_name}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->phone}}</td>
                                <td>{{$service->status}}</td>
                            <td><a data-target="#myModal{{$service->id}}" data-toggle="modal" style="cursor: pointer" class="btn btn-warning">Approve</a>
                                <a data-target="#myModalreject{{$service->id}}" data-toggle="modal" style="cursor: pointer;color: #fff" class="btn btn-secondary">Reject</a>
                                <a href="{{route('adminService.edit',$service->id)}}" class="btn btn-success">Edit</a>
                                <a data-target="#myModalDel{{$service->id}}" data-toggle="modal"   class="btn btn-danger">Delete</a></td>
                            {{-- Approval --}}
                                <div id="myModal{{$service->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Approval</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to approve this ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('adminService.approve',$service->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Reject --}}
                                <div id="myModalreject{{$service->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Reject</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to <b>reject</b> this ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('adminService.reject',$service->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Reject --}}
                                <div id="myModalDel{{$service->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Service</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to <b>delete</b> this service ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('adminService.destroy',$service->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger" >Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Category</th>
                            <th>Place</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('jsFooter')
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
