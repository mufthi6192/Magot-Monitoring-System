@extends('Main.index')

@section('main')

    <div class="page-content">

        <h6 class="mb-0 text-uppercase">Data Pompa A</h6>
        <hr/>

        <div class="card radius-10 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Status Pompa A</p>
                        <h4 class="my-1 text-white">{{strtoupper($status->pump_a)}}</h4>
                        <p class="mb-0 font-13 text-white"><i class="bx bxs-stopwatch"></i> Terakhir diupdate pada {{$status->updated_at}}</p>
                    </div>
                    <div class="widgets-icons bg-white text-info ms-auto"><i class="bx bxs-droplet-half"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid"> <a href="#" onclick="turnOnPumpA()" class="btn btn-success px-5 radius-30">Hidupkan Pompa A</a>
            <div class="clearfix mb-2"></div>
            <a href="#" onclick="turnOffPumpA()" class="btn btn-danger px-5 radius-30">Matikan Pompa A</a>
        </div>

    </div>

@endsection
