<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('front.partial.head')
<body>
<div class="container-fluid" style="background: #dee0df;border-bottom: 5px #ccc solid; ">
    <div class="container">
        @include('front.partial.topMenu')
    </div>
</div>


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
    @yield('content')
</div>
@include('front.partial.footer')
</body>
</html>
