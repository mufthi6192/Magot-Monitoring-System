<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!-- highcharts js -->
<script src="{{asset('assets/js/index4.js')}}"></script>
<!--app JS-->
<script src="{{asset('assets/js/app.js')}}"></script>

<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

<script>

    function allData(){
        $.ajax({
            type: "GET",
            url: "/api/data/all",
            // headers: {
            //     Authorization: `Bearer` + `${localStorage.getItem("jwt_token")}`
            // },
            success: function (result, status, xhr) {
                dataTable(result)
            },
            error: function (xhr, status, error) {
                let responseCode = xhr.status
                if(responseCode === 401){
                    window.location.href = "/admin/auth/login"
                }else if(responseCode === 404){
                    dataTable([])
                }else{
                    alert("Internal server error")
                }
            }
        });
    }

    function dataTable(data){
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print'],
            bDestroy: true,
            //"responsive": true,
            data: data,
            columns: [
                {
                    "data": "temperature"
                },
                {
                    "data": "humidity"
                },
                {
                    "data": "lamp"
                },
                {
                    "data": "pump"
                },
                {
                    "data" : "created_at"
                },
                {
                    "data" : "updated_at"
                }

            ]
        } );

        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    }

    $(document).ready(function() {
        allData()
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
