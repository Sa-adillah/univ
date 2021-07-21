@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Mahasiswa
                </div>

                <div class="card-body">
                    <form action="{{ route('update.nilai', $nilai->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Nama Mahasiswa</label>
                                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                                        <option value="" disabled selected>--Pilih User--</option>
                                        @foreach ($mahasiswa as $mhs)
                                        <option value="{{ $mhs->id }}" {{ $nilai->mahasiswa_id == $mhs->id ? 'selected' : '' }}> {{ $mhs->user->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Nama Makul</label>
                                    <select name="makul_id" id="makul_id" class="form-control">
                                        <option value="" disabled selected>--Pilih Makul--</option>
                                        @foreach ($makul as $mkl)
                                        <option value="{{ $mkl->id }}" {{ $nilai->makul_id == $mkl->id ? 'selected' : '' }}> {{ $mkl->nama_makul }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Nilai</label>
                                    <input type="number" name="nilai" value="{{ is_null ('$nilai') ? '' : $nilai->nilai }}" class="form-control" placeholder="Tambahkan Nilai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row float-right">
                                <div class="col">
                                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                    <a href="{{route('nilai')}}" class="btn btn-md btn-danger">BATAL</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
