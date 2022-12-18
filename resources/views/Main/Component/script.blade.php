<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!-- highcharts js -->
<script src="{{asset('assets/plugins/highcharts/js/highcharts.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/highcharts-more.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/variable-pie.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/solid-gauge.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/highcharts-3d.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/cylinder.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/funnel3d.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/exporting.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/export-data.js')}}"></script>
<script src="{{asset('assets/plugins/highcharts/js/accessibility.js')}}"></script>
<script src="{{asset('assets/js/index4.js')}}"></script>
<!--app JS-->
<script src="{{asset('assets/js/app.js')}}"></script>

<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );

        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>

@if($script_code == 'lamp-a')
    @include('Main.Output.LampA.js')
@elseif($script_code == 'lamp-b')
    @include('Main.Output.LampB.js')
@elseif($script_code == 'pump-a')
    @include('Main.Output.PumpA.js')
@elseif($script_code == 'pump-b')
    @include('Main.Output.PumpB.js')
@endif
