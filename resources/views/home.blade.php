@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tentang anda</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! session('status') !!}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">
                            <img src="{{Auth::user()->avatar_url}}" alt="" class="img-thumbnail img-circle">
                            <div class="d-flex justify-content-center">
                                <a style="margin-top: 20px;" href="/edit-datadiri" class="btn btn-primary"><i class="fas fa-edit"></i> edit dataku</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                                @if (Auth::user()->role_lvl == 1)
                                    <div class="alert alert-primary" role="alert">
                                        <i class="fas fa-user"></i> | Anda adalah anggota CSS!
                                    </div>
                                @else
                                    <div class="alert alert-success" role="alert">
                                        <i class="fas fa-user-check"></i> | Anda adalah Pengurus CSS!
                                    </div>
                                @endif
                                <table class="table table-bordered">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">Info</th>
                                            <th scope="col">Data</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama</th>
                                                <td>{{Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Skor</th>
                                                <td>{{Auth::user()->score}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Absen Kelas</th>
                                                <td>{{Auth::user()->css_number}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelas</th>
                                                <td>{{Auth::user()->class}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Gender</th>
                                                <td>
                                                    @if (Auth::user()->gender == 1)
                                                        Laki-laki
                                                    @else
                                                        @if (Auth::user()->gender == 2)
                                                            Perempuan
                                                        @else
                                                            Dirahasiakan
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                      </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->role_lvl == 2)
    <div class="mt-2 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard khusus Pengurus</div>
    
                    <div class="card-body">
                       <a href="/pengurus/buat-latihan" class="btn btn-success btn-lg">Buat Latihan</a>
                       <a href="/pengurus/review-submisi" class="btn btn-primary btn-lg">Review Submisi</a>
                       <a href="/pengurus/rekap-nilai" class="btn btn-info btn-lg">Rekap Nilai</a>
                       <a href="/pengurus/tutup-latihan" class="btn btn-danger btn-lg">Tutup Latihan</a>
                       <a href="/pengurus/arsip-latihan" class="btn btn-info btn-lg">Arsip latihan</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="mt-2 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Latihan yang belum selesai</div>
    
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($tugas_belum as $i)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{$i->course_name}}
                                    <a href="home/latihan/{{$i->id}}" class="badge badge-primary badge-pill">Klik! ></a>
                                </li>
                            @endforeach
                                   
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
