@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card">
                <div class="card-body text-center">
                  <div class="row justify-content-center">
                    <div class="col-12 col-xl-10">
                        <div class="mt-5"></div>
                      <img src="https://dashkit.goodthemes.co/assets/img/illustrations/happiness.svg" alt="..." class="img-fluid mt-n5 mb-4" style="max-width: 272px;">
              
                      <h2>
                          Kenali teman-teman yang ikut ekstra CSS disini!
                      </h2>
              
                      <p class="text-muted">
                          Disini semua profil anggota CSS. kalian bisa kenal mereka lewat sini!
                      </p>
                    
                    </div>
                  </div>
                </div>
              </div>

    <!-- List group -->
    <ul class="list-group list-group-flush list my-n3">
       @foreach ($users as $user)
       <li class="list-group-item px-0">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="/home/anggota/{{$user->id}}" class="avatar">
                                        @if ($user->avatar_url == '/img/noavatar.png')
                                        <img src="{{asset('/img/noavatar.png')}}" alt="{{$user->name}} belum mengganti avatar" class="avatar-img rounded-circle">
                                        @else
                                        <img src="{{ asset('/storage/useravatar/'.$user->avatar_url)}}" alt="{{$user->name}} avatar" class="avatar-img rounded-circle">
                                        @endif
                                    </a>
                                </div>
                            <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="mb-1 name">
                                <a class="name" href="/home/anggota/{{$user->id}}">{{$user->name}}</a>
                                </h4>

                                <!-- Time -->
                                <p class="small mb-0">
                                    @if ($user->role_lvl == 2)
                                        <span class="text-success">●</span> Pengurus CSS
                                    @else
                                        <span class="text-secondary">●</span> Anggota CSS
                                    @endif
                                </p>
                            <p class="mt-1">
                                @if ($user->gender == 1)
                                    <i class="fas fa-mars"></i>
                                @else
                                    @if ($user->gender == 2)
                                        <i class="fas fa-venus"></i>
                                    @else
                                        <i class="fas fa-question"></i>
                                    @endif
                                @endif
                                |
                                Kelas: {{$user->class}} 
                                | 
                                Absen: {{$user->css_number}}
                            </p>

                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="/home/anggota/{{$user->id}}" class="btn btn-sm btn-white">
                                    Lihat Profil!
                                </a>
                            </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </li>
       @endforeach
    </ul>
</div>
@endsection
