<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Social Services</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            {{--            <li class="nav-item active">--}}
            {{--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">Features</a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">Pricing</a>--}}
            {{--            </li>--}}
        </ul>
        <span class="navbar-text">
     <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
    Add Services
</button>
    </span>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add New Service</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Provider type</label>
                                <select class="form-control" name="provider_type">
                                    <option selected disabled >Select Provider</option>
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
                                        style="width: 100%;" tabindex="-1" aria-hidden="true" name="d_id" id="district" onchange="cityfilter(this.value)">
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
                                        style="width: 100%;" tabindex="-1" aria-hidden="true" name="c_id" id="city">

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
                                <input type="tel" class="form-control" id="exampleFormControlInput1" autocomplete="off" name="phone">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

