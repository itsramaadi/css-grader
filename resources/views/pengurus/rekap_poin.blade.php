@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rekap Poin</h1>
        <p>Berikut adalah total perolehan poin semua anggota CSS. Ini bisa langsung di copy di EXCEL saja.</p>
        <hr>

        <div class="card">
            <div class="card-header">
                      Rekap Poin
            </div>
            <div class="card-body">
                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Absen</th>
                                <th scope="col">Skor</th>
                              </tr>
                            </thead>
                            <tbody>
            
                            @foreach ($leaderboard as $lb)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user[( ($lb->user_id) - 1)]->name}}</td>
                                        <td>{{$user[( ($lb->user_id) - 1)]->class}}</td>
                                        <td>{{$user[( ($lb->user_id) - 1)]->css_number}}</td>
                                        <td>{{$lb->pts}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

    </div>
@endsection