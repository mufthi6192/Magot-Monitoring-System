<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3">

<head>
    @include('Main.Component.header')
</head>

<body>
<!--wrapper-->
<div class="wrapper">

    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        @include('Main.Component.sidebar')
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        @include('Main.Component.topbar')
    </header>
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
        @yield('main')
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    @include('Main.Component.footer')
</div>
<!--end wrapper-->

{{--JS Section--}}
@include('Main.Component.script')
{{--End JS Section--}}
</body>

</html>
