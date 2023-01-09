<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="{{asset('dev/images/apple-touch-icon.png')}}" />
    <link href="{{asset('dev/images/apple-touch-startup-image-320x460.png')}}" media="(device-width: 320px)" rel="apple-touch-startup-image">
    <link href="{{asset('dev/images/apple-touch-startup-image-640x920.png')}}" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
    <title>Alfian - Monitoring System</title>
    <link rel="stylesheet" href="{{asset('dev/css/framework7.css')}}">
    <link rel="stylesheet" href="{{asset('dev/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('dev/css/swipebox.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('dev/css/animations.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('dev/css/plyr.html')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
</head>
<body id="mobile_wrap">

<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>



<div class="views">

    <div class="view view-main">



        <div class="pages">

            <div data-page="index" class="page homepage">
                <div class="page-content homepagecontent">


                    <!-- Slider -->
                    <div class="swiper-container swiper-init" data-effect="slide" data-parallax="true" data-pagination=".swiper-pagination" data-pagination-clickable="true">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <img src="{{asset('dev/images/slider/1.png')}}" alt="" title="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('dev/images/slider/2.png')}}" alt="" title="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('dev/images/slider/3.png')}}" alt="" title="" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>

                    <nav class="main-nav">
                        <ul>
                            <li><a href="#" onclick="turnOnPump()"><img src="{{asset('dev/images/icon/1.png')}}"><span>Tombol On Pompa</span></a></li>
                            <li><a href="#" onclick="turnOffPump()"><img src="{{asset('dev/images/icon/1.png')}}"><span>Tombol Off Pompa</span></a></li>
                            <li><a href="#" onclick="turnOnLamp()"><img src="{{asset('dev/images/icon/2.png')}}" alt="" title="" /><span>Tombol On Lampu</span></a></li>
                            <li><a href="#" onclick="turnOffLamp()"><img src="{{asset('dev/images/icon/2.png')}}" alt="" title="" /><span>Tombol Off Lampu</span></a></li>
                            <li><a href="#" onclick="redirectData()"><img src="{{asset('dev/images/icon/3.png')}}" alt="" title="" /><span>Data</span></a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>


    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    function turnOnPump(){
        $.ajax({
            url: '/output/pump/turn-on',
            method: 'GET',
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 'success') {
                    swal({
                        title: 'Sukses',
                        text: res.msg,
                        icon: "success",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((ok) => {
                        window.location.href = '/';
                    });
                } else {
                    swal({
                        title: 'Gagal',
                        text: res.msg,
                        icon: "error",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });
                }
            }
        });
    }

    function turnOffPump(){
        $.ajax({
            url: '/output/pump/turn-off',
            method: 'GET',
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 'success') {
                    swal({
                        title: 'Sukses',
                        text: res.msg,
                        icon: "success",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((ok) => {
                        window.location.href = '/';
                    });
                } else {
                    swal({
                        title: 'Gagal',
                        text: res.msg,
                        icon: "error",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });
                }
            }
        });
    }

    function turnOnLamp(){
        $.ajax({
            url: '/output/lamp/turn-on',
            method: 'GET',
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 'success') {
                    swal({
                        title: 'Sukses',
                        text: res.msg,
                        icon: "success",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((ok) => {
                        window.location.href = '/';
                    });
                } else {
                    swal({
                        title: 'Gagal',
                        text: res.msg,
                        icon: "error",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });
                }
            }
        });
    }

    function turnOffLamp(){
        $.ajax({
            url: '/output/lamp/turn-off',
            method: 'GET',
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 'success') {
                    swal({
                        title: 'Sukses',
                        text: res.msg,
                        icon: "success",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((ok) => {
                        window.location.href = '/';
                    });
                } else {
                    swal({
                        title: 'Gagal',
                        text: res.msg,
                        icon: "error",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    });
                }
            }
        });
    }

    function redirectData(){
        window.location.replace("/merge");
    }
</script>

<script type="text/javascript" src="{{asset('dev/js/jquery-1.12.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/jquery.validate.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('dev/js/framework7.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/jquery.swipebox.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/jquery.fitvids.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/email.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/audio.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/classie.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/selectFx.js')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/plyr.html')}}"></script>
<script type="text/javascript" src="{{asset('dev/js/my-app.js')}}"></script>
</body>

</html>
