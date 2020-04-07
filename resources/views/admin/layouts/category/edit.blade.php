@extends('admin.app')
@section('category-main-li','menu-open')
@section('category-active-add','active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit New Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                    <form action="{{route('adminCategory.update',$category->id)}}" method="POST"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="cat_name"
                                   placeholder="Cat Name.." value="{{$category->cat_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Category Image</label>
                            <div class="col-md-4" style="margin-bottom: 10px">
                                <img src="{{asset('image').'/'.$category->image}}" alt="">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('adminCategory.index')}}"  class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary right">Update Category</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
