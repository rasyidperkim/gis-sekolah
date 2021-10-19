@extends('layouts.backend')

@section('content')
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Kecamatan di Kota Banjarmasin') }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card-tools">
                    <a href="{{ route('kecamatan.create') }}" type="button" class="btn btn-outline-success btn-sm mb-3"><i
                            class="fas fa-plus"> Add Data</i>
                    </a>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-sm-1">No.</th>
                            <th class="col-sm-5">Kecamatan</th>
                            <th class="col-sm-2">Warna</th>
                            <th class="col-sm-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($kecamatan as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kecamatan }}</td>
                                <td style="background-color: {{ $data->warna }}"></td>
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <form action="" method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" class="btn btn-danger" style="display: none;" />
    </form>
@endsection
