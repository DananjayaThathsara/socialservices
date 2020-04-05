<!DOCTYPE html>
<html>
@include('admin.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- TopNav -->
@include('admin.partials.topNav')
<!-- /TopNav -->
    <!-- SideNav -->
@include('admin.partials.sideNav')
<!-- /sideNav -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('admin.partials.footer')
</div>
<!-- ./wrapper -->
@include('admin.partials.jsFooter')
</body>
</html>
