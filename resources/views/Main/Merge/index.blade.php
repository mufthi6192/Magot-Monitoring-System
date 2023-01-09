@extends('Main.index')

@section('main')

    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-3">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Lampu A</p>
                                <h4 class="font-weight-bold">{{strtoupper($lamp)}}</h4>
                                <p class="mb-0 font-13">Terakhir diupdate {{\Carbon\Carbon::parse($time)->diffForHumans()}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-cosmic text-white"><i class='bx bx-sun'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Lampu B</p>
                                <h4 class="font-weight-bold">{{strtoupper($lamp)}}</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate {{\Carbon\Carbon::parse($time)->diffForHumans()}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-burning text-white"><i class='bx bx-sun'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Pompa A</p>
                                <h4 class="font-weight-bold">{{strtoupper($pump)}}</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate {{\Carbon\Carbon::parse($time)->diffForHumans()}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-lush text-white"><i class='bx bx-cloud-light-rain'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Pompa B</p>
                                <h4 class="font-weight-bold">{{strtoupper($pump)}}</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate {{\Carbon\Carbon::parse($time)->diffForHumans()}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-kyoto text-white"><i class='bx bxs-cloud-rain'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Suhu</p>
                                <h4 class="font-weight-bold">{{$temperature}}&#8451;</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate {{\Carbon\Carbon::parse($time)->diffForHumans()}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-blues text-white"><i class='bx bxs-thermometer'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Kelembaban</p>
                                <h4 class="font-weight-bold">{{$humidity}}% </h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate{{\Carbon\Carbon::parse($time)->diffForHumans()}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-moonlit text-white"><i class='bx bx-droplet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Suhu</th>
                            <th>Nilai Kelembaban</th>
                            <th>Status Lampu</th>
                            <th>Status Pompa</th>
                            <th>Data Dibuat</th>
                            <th>Data Diupdate</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
