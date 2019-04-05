@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Arsip tugas
            </div>
            <div class="card-body">
                Berikut adalah arsip latihan. <br>
                Tugas yang sudah diarsipkan tidak dapat lagi di kerjakan oleh user.
            </div>
        </div>

        <div class="card">
                <div class="card-body">
                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Tugas</th>
                                    <th scope="col">Tanggal Pembuatan</th>
                                    <th scope="col">Maks Skor</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                
                                @foreach ($course_archived as $ca)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$ca->course_name}}</td>
                                            <td>{{$ca->created_at}}</td>
                                            <td>{{$ca->max_score}}</td>
                                            <td>
                                                <form action="/pengurus/batal-arsip/latihan/{{$ca->id}}" method="POST">
                                                    <input name="_method" type="hidden" value="PUT">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Batal arsip</button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
    </div>
@endsection