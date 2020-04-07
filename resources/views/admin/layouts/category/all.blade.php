@extends('admin.app')
@section('category-main-li','menu-open')
@section('category-active-all','active')
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
                    <h1 class="m-0 text-dark">All Categories - <a href="{{route('adminCategory.create')}}" class="btn btn-primary">Add New</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Categories</li>
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
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{asset('image').'/'.$category->image}}" alt="" width="80" height="80"></td>
                                <td>{{$category->cat_name}}</td>
                                <td><a href="{{route('adminCategory.edit',$category->id)}}" class="btn btn-primary">Edit</a> <a data-target="#myModal{{$category->id}}" data-toggle="modal" class="btn btn-danger" style="display: none">Delete</a>
                                </td>
                                <div id="myModal{{$category->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Category</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to <b>delete</b> this category ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('adminCategory.destroy',$category->id)}}" method="post">
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
                            <th>Image</th>
                            <th>Category Name</th>
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
