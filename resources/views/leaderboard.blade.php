@extends('layouts.app')

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
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user[( ($lb->user_id) - 1)]->name}}</td>
                                        <td>{{$lb->pts}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>



@endsection