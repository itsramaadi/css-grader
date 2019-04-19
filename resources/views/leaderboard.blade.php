@extends('layouts.app')
@section('stylesheet')
    <style>
        .bestperingkat{
            background-color: #E63757;
            color: #FFFF;
        }
        .bestperingkat td{
            background-color: #12263F;
            color: #FFFF;
        }
        .hl{
            background-color: #E63757;
            color: #FFFF;
        }
        .hl td{
            background-color: #E63757;
            color: #FFFF;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Info menarik!
            </div>
            <div class="card-body">
                <h3>Hadiah bagi top #1</h3>
                <p>
                    Kami akan memberikan hadiah bagi anggota CSS yang berhasil 
                    mempertahankan peringkat #1 selama 3 bulan berupa sebuah 
                    T-Shirt desain khusus. <br>
                    Kami menjamin keadilan dalam pemberian skor. Jadi, gausah takut ada yang ngecit :) <br>
                    Ayo, rajin buat tugas!
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                      Leaderboard
            </div>
            <div class="card-body">
                <p><i class="fas fa-check"></i> = Mendapatkan Hadiah</p>
                <p><i class="fas fa-arrow-circle-right"></i> = Penunjuk</p>
                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Skor</th>
                              </tr>
                            </thead>
                            <tbody>
            
                            @foreach ($leaderboard as $lb)
                                   @if ($loop->iteration <= 3)
                                        @if ($hl == $lb->user_id)
                                            <tr class="hl" id="user:{{str_replace(' ', '', $user[( ($lb->user_id) - 1)]->name)}}-{{$user[( ($lb->user_id) - 1)]->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td><i class="fas fa-check"></i> {{$user[( ($lb->user_id) - 1)]->name}}</td>
                                                <td>{{$lb->pts}}</td>
                                            </tr>
                                            @else
                                            <tr class="bestperingkat" id="user:{{str_replace(' ', '', $user[( ($lb->user_id) - 1)]->name)}}-{{$user[( ($lb->user_id) - 1)]->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td><i class="fas fa-check"></i> {{$user[( ($lb->user_id) - 1)]->name}}</td>
                                                <td>{{$lb->pts}}</td>
                                            </tr>
                                        @endif
                                        @else
                                            @if ($hl == $lb->user_id)
                                                <tr class="hl" id="user:{{str_replace(' ', '', $user[( ($lb->user_id) - 1)]->name)}}-{{$user[( ($lb->user_id) - 1)]->id}}">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><i class="fas fa-arrow-circle-right"></i> {{$user[( ($lb->user_id) - 1)]->name}}</td>
                                                    <td>{{$lb->pts}}</td>
                                                </tr>
                                            @else
                                            <tr id="user:{{str_replace(' ', '', $user[( ($lb->user_id) - 1)]->name)}}-{{$user[( ($lb->user_id) - 1)]->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$user[( ($lb->user_id) - 1)]->name}}</td>
                                                <td>{{$lb->pts}}</td>
                                            </tr>
                                            @endif
                                        <tr id="user:{{str_replace(' ', '', $user[( ($lb->user_id) - 1)]->name)}}-{{$user[( ($lb->user_id) - 1)]->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$user[( ($lb->user_id) - 1)]->name}}</td>
                                                <td>{{$lb->pts}}</td>
                                        </tr>
                                   @endif
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>



@endsection