@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kecamatan</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('kecamatan.update', $kecamatan) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control  @error('kecamatan') is-invalid @enderror"
                        placeholder="Masukkan Nama Kecamatan" value="{{ old('kecamatan') ?? $kecamatan->kecamatan }}">
                    @error('kecamatan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>

@endsection
