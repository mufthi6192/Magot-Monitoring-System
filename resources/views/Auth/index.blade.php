<!doctype html>
<html lang="en">

<head>
    @include('Auth.Component.header')
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">


                    @if(session('fail'))
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                                </div>
                                <div class="ms-3">
                                    <div class="text-white">{{session('fail')}}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Main Section --}}
                    @if($uri_segment=='login')
                        @include('Auth.Login.login')
                    @elseif($uri_segment=='register')
                        @include('Auth.Register.register')
                    @else
                        @include('Auth.Login.login')
                    @endif
                    {{-- End Main Section --}}

                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->

{{--Script--}}
@include('Auth.Component.script')
{{--End Script--}}

</body>

</html>
