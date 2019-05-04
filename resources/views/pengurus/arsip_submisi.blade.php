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
                Arsip Submisi
            </div>
            <div class="card-body">
                Berikut adalah arsip submisi. Ini adalah daftar tugas yang sudah diperiksa. Sangat berguna apabila ingin memperbaiki.
            </div>
        </div>

        <div class="card">
                <div class="card-body">
                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Tugas</th>
                                    <th scope="col">Uploader</th>
                                    <th scope="col">Tanggal Pembuatan</th>
                                    <th scope="col">Skor</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                
                               @foreach ($submission as $sb)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sb->courses->course_name}}</td>
                                            <td>{{$sb->users->name}}</td>
                                            <td>{{$sb->created_at->toDayDateTimeString()}}</td>
                                            <td>{{$sb->score_achieved}}</td>
                                            <td>
                                              <a href="/pengurus/review/{{$sb->id}}" class="btn btn-primary">Edit nilai</a>
                                            </td>
                                        </tr>
                                @endforeach 
                            </tbody>
                        </table>
                </div>
            </div>
    </div>
@endsection