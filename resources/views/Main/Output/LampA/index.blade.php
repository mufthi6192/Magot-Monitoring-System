@extends('Main.index')

@section('main')

    <div class="page-content">

        <h6 class="mb-0 text-uppercase">Data Lampu A</h6>
        <hr/>

        <div class="card radius-10 bg-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Status Lampu A</p>
                        <h4 class="my-1 text-white">{{strtoupper($status->lamp_a)}}</h4>
                        <p class="mb-0 font-13 text-white"><i class="bx bxs-stopwatch"></i> Terakhir diupdate pada {{$status->updated_at}}</p>
                    </div>
                    <div class="widgets-icons bg-white text-info ms-auto"><i class="bx bxs-sun"></i>
                    </div>
                </div>
            </div>
        </div>



        <div class="d-grid"> <a href="#" onclick="turnOnLampA()" class="btn btn-success px-5 radius-30">Hidupkan Lampu A</a>
            <div class="clearfix mb-2"></div>
            <a href="#" onclick="turnOffLampA()" class="btn btn-danger px-5 radius-30">Matikan Lampu A</a>
        </div>




    </div>

@endsection
