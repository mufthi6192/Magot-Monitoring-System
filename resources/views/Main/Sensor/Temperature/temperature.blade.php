@extends('Main.index')

@section('main')

    <div class="page-content">

        <h6 class="mb-0 text-uppercase">Data Suhu</h6>
        <hr/>

        <div class="card radius-10 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Nilai Suhu</p>
                        <h4 class="my-1 text-white">{{$latest_data->sensor_value}}&#8451;</h4>
                        <p class="mb-0 font-13 text-white"><i class="bx bxs-stopwatch"></i> Terakhir diupdate pada {{$latest_data->created_at}}</p>
                    </div>
                    <div class="widgets-icons bg-white text-info ms-auto"><i class="bx bxs-thermometer"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nilai Suhu</th>
                            <th>Data Dibuat</th>
                            <th>Data Diupdate</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($temperature_data as $key => $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->sensor_value}}&#8451;</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
