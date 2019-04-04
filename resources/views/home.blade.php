@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex">
        <div class="mr-4">

            <div class="avatar avatar-xl">
                <img src="{{Auth::user()->avatar_url}}" alt="..." class="avatar-img rounded-circle">
            </div>
        </div>
        <div class="p-2">
            <h3>Selamat datang,</h3>
            <h1>
                {{Auth::user()->name}}
                @if (Auth::user()->role_lvl == 2)
                <i class="fas fa-check-circle" style="color: #00d97e"></i>
                @else
                <i class="fas fa-check-circle" style="color: #6e84a3"></i>
                @endif
            </h1>
            @if (Auth::user()->role_lvl == 2)
                <a href="/pengurus/home">Dasboard Pengurus</a> |
            @endif <a href="/profile/{{Auth::user()->id}}">Laman publik mu</a> | <a href="#">Edit profil</a> | <a href="/home/cari-anggota">Cari anggota CSS</a>
        </div>
    </div>
    <hr>

    @if (session('status'))
        <div class="alert alert-success">
            {!! session('status') !!}
        </div>
    @endif

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <b><i class="fas fa-bullhorn"></i> Perhatian! </b> Baca review untuk improvisasi di kemudian hari!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="row">
        <div class="mb-3 col-md-6 col-xs-12">
            <div class="card-deck">


                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    <i class="fas fa-star"></i> Skor anda
                                </h6>
                                <span class="h2 mb-0">
                                    {{$score}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    <i class="fas fa-chart-line"></i> Peringkat
                                </h6>
                                <span class="h2 mb-0">
                                    <a href="/home/leaderboard">Lihat di leaderboard!</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    <i class="fas fa-user"></i> Gelar
                                </h6>
                                <span class="h2 mb-0">
                                    @if (Auth::user()->role_lvl == 2)
                                    Pengurus CSS
                                    @else
                                    Anggota CSS
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mb-3 col-md-6 col-xs-12">

            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    <i class="fas fa-chart-line"></i> Tugas dikerjakan
                                </h6>
                                <span class="h2 mb-0">
                                    0
                                    <div class="mb-3"></div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    <i class="fas fa-chart-line"></i> Pending review
                                </h6>
                                <span class="h2 mb-0">
                                    0
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    <i class="fas fa-chart-line"></i> Sudah di review
                                </h6>
                                <span class="h2 mb-0">
                                    0
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-6 col-xs-12">
                <div class="card">
                        <div class="card-header">Semua tugas</div>
                        <div class="card-body">
                            <ul>
                                @foreach ($task as $ts)
                                    <li><a href="home/latihan/{{$ts->id}}">{{ $ts->course_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="card">
                <div class="card-header">Tugas yang sudah di review</div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($reviewed as $rw)
                            <a href="/home/review/{{$rw->id}}" class="list-group-item list-group-item-action">{{ $rw->courses->course_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-inactive mt-3">
            <div class="card-header">Tugas yang belum di review</div>

            <div class="card-body">

                <div class="list-group">
                    @foreach ($pendingsub as $ps)
                        <a href="/home/review/{{$ps->id}}" class="list-group-item list-group-item-action">{{ $ps->courses->course_name }}</a>
                    @endforeach
                </div>
            </div>
    </div>

</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@endsection
