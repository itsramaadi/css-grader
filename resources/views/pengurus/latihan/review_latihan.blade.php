@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
              {!! session('status') !!}
          </div>
        @endif
        <div class="card">
            <div class="card-header">Daftar submisi</div>
            <div class="card-body">

                    <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul Latihan</th>
                                <th scope="col">Uploader</th>
                                <th scope="col">Lihat</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($submission as $sb)
                                <tr>
                                    <th scope="row">{{$sb->id}}</th>
                                    <td>{{$sb->courses->course_name}}</td>
                                    <td>{{$sb->users->name}}</td>
                                    <td><a href="/pengurus/review/{{$sb->id}}" class="btn btn-primary">Review</a></td>
                                </tr>  
                              @endforeach
                            </tbody>
                          </table>

            </div>
        </div>
    </div>
@endsection