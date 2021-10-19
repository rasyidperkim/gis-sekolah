@extends('layouts.backend')


@section('content')
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Add Data') }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <form action="kecamatan/insert" role="form">
                @csrf
                <!-- /.card-header -->
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan"
                                    class="form-control  @error('kecamatan') is-invalid @enderror" placeholder="Kecamatan">
                                @error('kecamatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <div class="text-danger">
                                    @error('kecamatan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input name="warna" type="text" class="form-control" placeholder="Warna">

                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>GEOJSON</label>
                                <textarea name="geojson" class="form-control" cols="30" rows="10"
                                    placeholder="Masukkan text Geojson disini"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"> Save</i></button>
                    <button type="submit" class="btn btn-warning float-right" onclick="goBack()"> Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>



    <script>
        $(function() {
            //color picker with addon
            $('.my-colorpicker2').colorpicker()
            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>

@endsection
