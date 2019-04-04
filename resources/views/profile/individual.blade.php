@extends('layouts.app')

@section('content')
<div class="container">


    <div class="header">

        <img src="https://dashkit.goodthemes.co/assets/img/covers/profile-cover-1.jpg" class="header-img-top" alt="...">

        <div class="container-fluid">

            <div class="header-body mt-n5 mt-md-n6">
                <div class="row align-items-end">
                    <div class="col-auto">

                        <div class="avatar avatar-xxl header-avatar-top">
                            <img src="{{asset($profile->avatar_url)}}" alt="..."
                                class="avatar-img rounded-circle border border-4 border-card">
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
                                <a href="profile-projects.html" class="nav-link">
                                    File di upload
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3>Disinilah nanti Featured page mu diperlihatkan, coming soon!</h3>





</div>
@endsection
