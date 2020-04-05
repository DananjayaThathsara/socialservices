@extends('front.app')

@section('content')

    <div class="row" id="home">
        <div class="col-md-3">
            <a href="{{ route('index') }}" class="btn btn-warning" style="margin-top: 5px;cursor: pointer">Go Back</a>
            <br><br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$catname->cat_name}}</li>
                </ol>
            </nav>
            <br><br>
            <h3 class="display-6"><b>Filter By</b></h3>
            <form action="{{url('search')}}" method="GET">
            <div class="form-group" style="margin-top:18px;">
                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select Your City"
                        style="width: 100%;" tabindex="-1" aria-hidden="true" name="category">
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-top:18px;">
                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select Your City"
                        style="width: 100%;" tabindex="-1" aria-hidden="true" name="city">
                    <option selected disabled>Select Your City</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->c_name}}</option>
                    @endforeach
                </select>
            </div>
                <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
            </form>
            <br><br>
            <h3 class="display-6"><b>All Categories</b></h3>
            <ul class="list-group">

                @forelse($categories as $category)

                    <a href="{{route('category',$category->id)}}"><li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$category->cat_name}}
                            <span class="badge badge-primary badge-pill">{{$category->services->count()}}</span>
                        </li></a>

                @empty
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>No Services...</strong>
                    </div>
                @endforelse

            </ul>
        </div>
        <div class="col-md-6">
            <br><br>
            <h2 class="display-6"><b>Government Providers</b></h2>
            @forelse($governments as $government)
                <div class="row" style="border: 1px #ccc solid;padding: 10px;border-radius: 5px;margin-bottom: 10px">
                    <div class="col-md-4"><img src="{{asset('image/default.png')}}" alt=""></div>
                    <div class="col-md-8">
                        <h4 style="text-align:left">{{$government->name}}</h4>
                        <h6>Service :{{$government->category->cat_name}}</h6>
                        <h6>Location :{{$government->city->c_name}}</h6>
                        <h6>Phone :{{$government->phone}}</h6>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger alert-block">

                    <strong>No Services ...</strong>
                </div>
            @endforelse
            <h2 class="display-6" style="margin-top: 30px"><b>Private Providers</b></h2>
            @forelse($privates as $private)
                <div class="row" style="border: 1px #ccc solid;padding: 10px;border-radius: 5px;margin-bottom: 10px">
                    <div class="col-md-4"><img src="{{asset('image/default.png')}}" alt=""></div>
                    <div class="col-md-8">
                        <h4 style="text-align:left">{{$private->name}}</h4>
                        <h6>Service :{{$private->category->cat_name}}</h6>
                        <h6>Location :{{$private->city->c_name}}</h6>
                        <h6>Phone :{{$private->phone}}</h6>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger alert-block">

                    <strong>No Services..</strong>
                </div>
            @endforelse
            {{$governments->links()}}
        </div>
    </div>
@endsection
