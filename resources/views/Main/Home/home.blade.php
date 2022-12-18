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
                                <h4 class="font-weight-bold">{{strtoupper($status->lamp_a)}}</h4>
                                <p class="mb-0 font-13">Terakhir diupdate pada {{$status->updated_at}}</p>
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
                                <h4 class="font-weight-bold">{{strtoupper($status->lamp_b)}}</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate pada {{$status->updated_at}}</p>
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
                                <h4 class="font-weight-bold">{{strtoupper($status->pump_a)}}</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate pada {{$status->updated_at}}</p>
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
                                <h4 class="font-weight-bold">{{strtoupper($status->pump_b)}}</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate pada {{$status->updated_at}}</p>
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
                                <h4 class="font-weight-bold">{{$temperature->sensor_value}}&#8451;</h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate pada {{$temperature->created_at}}</p>
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
                                <h4 class="font-weight-bold">{{$humidity->sensor_value}}% </h4>
                                <p class="text-secondary mb-0 font-13">Terakhir diupdate pada {{$humidity->created_at}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-moonlit text-white"><i class='bx bx-droplet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <h4 class="mb-0 font-weight-bold">Informasi Pengguna</h4>
            </div>

                <div class="card-body">
                    <h6>1. Server akan hidup selama 24 Jam dan akan mengambil data dari perangkat IoT.</h6>
                    <h6>2. Apabila perangkat IoT tidak terdeteksi dalam keadaan hidup maka server tidak akan merespon perintah input dari website</h6>
                    <h6>3. Data yang akan ditampilkan adalah data yang diambil pada tanggal hari ini untuk mencegah data menjadi overload </h6>
                    <h6>4. Silahkan hubungi admin jika terjadi masalah terhadap website</h6>
                </div>

        </div>

    </div>

@endsection
