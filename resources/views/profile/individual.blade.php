@extends('layouts.app')

@section('content')
    <div class="header">
        @if ($profile->cover_img == "/img/mountains.png")
            <img src="{{asset('/img/mountains.png')}}" class="header-img-top" alt="sepertinya {{$profile->name}} belum mengganti sampul gambarnya">
        @else

        @endif
        <div class="container-fluid">

            <div class="header-body mt-n5 mt-md-n6">
                <div class="row align-items-end">
                    <div class="col-auto">

                        <div class="avatar avatar-xxl header-avatar-top">
                            @if ($profile->avatar_url == "/img/noavatar.png")
                                <img src="{{asset($profile->avatar_url)}}" alt="..."
                                     class="avatar-img rounded-circle border border-4 border-card">
                            @else
                                <img src="{{asset('/storage/useravatar/'.$profile->avatar_url)}}" alt="..."
                                     class="avatar-img rounded-circle border border-4 border-card" onclick="$('#modalProfil').modal({show:true});">
                            @endif
                        </div>

                    </div>
                    <div class="col mb-3 ml-n3 ml-md-n2">

                        <h6 class="header-pretitle">
                            @if ($profile->role_lvl == 2)
                                PENGURUS
                            @else
                                ANGGOTA
                            @endif
                        </h6>

                        <h1 class="header-title">
                            {{$profile->name}}
                            @if ($profile->role_lvl == 2)
                                <i class="fas fa-check-circle" style="color: #00d97e"></i>
                            @else
                                <i class="fas fa-check-circle" style="color: #6e84a3"></i>
                            @endif
                        </h1>

                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">

                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Homepage
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/home/anggota/{{$profile->id}}/uploaded" class="nav-link">
                                    File di upload
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="card-deck mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            <i class="fas fa-star"></i> Skor
                        </h6>
                        <span class="h2 mb-0">
                            {{$score}}
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
                            <i class="fas fa-chart-line"></i> Peringkat
                        </h6>
                        <span class="h2 mb-0">
                            <a href="/home/leaderboard?hl={{ $profile->id }}#user:{{str_replace(' ', '', $profile->name)}}-{{$profile->id}}">Lihat di leaderboard!</a>
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
                            <i class="fas fa-check-double"></i> Tugas Dikerjakan
                        </h6>
                        <span class="h2 mb-0">
                           {{$sub_done}}
                            <div class="mb-3"></div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 5px;">
                <iframe width="100%" height="800px" src="/example/featured.html/{{$profile->id}}" frameborder="0"></iframe>
        </div>
    </div>


</div>
    <!-- Modal -->
    <div class="modal fade" id="modalProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        @if ($profile->avatar_url == "/img/noavatar.png")
                            <img width="50%" height="50%" src="{{asset($profile->avatar_url)}}" alt="...">
                        @else
                                <img width="50%" height="50%" src="{{asset('/storage/useravatar/'.$profile->avatar_url)}}" alt="...">
                            <br>
                            <a class="btn btn-block btn-primary" href="{{asset('/storage/useravatar/'.$profile->avatar_url)}}" target="_blank">Klik untuk perbesar gambar!</a>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
