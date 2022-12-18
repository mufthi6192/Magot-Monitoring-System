@extends('Main.index')

@section('main')

    <div class="page-content">

        <h6 class="mb-0 text-uppercase">Data Lampu B</h6>
        <hr/>

        <div class="card radius-10 bg-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Status Lampu B</p>
                        <h4 class="my-1 text-white">{{strtoupper($status->lamp_b)}}</h4>
                        <p class="mb-0 font-13 text-white"><i class="bx bxs-stopwatch"></i> Terakhir diupdate pada {{$status->updated_at}}</p>
                    </div>
                    <div class="widgets-icons bg-white text-info ms-auto"><i class="bx bxs-sun"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid"> <a href="#" onclick="turnOnLampB()" class="btn btn-success px-5 radius-30">Hidupkan Lampu B</a>
            <div class="clearfix mb-2"></div>
            <a href="#" onclick="turnOffLampB()" class="btn btn-danger px-5 radius-30">Matikan Lampu B</a>
        </div>

    </div>

@endsection
