@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="/home" class="btn btn-primary">Kembali ke dashboard</a>
        </div>

        <div class="card">
            <div class="card-header">
                Informasi Latihan
            </div>
            <div class="card-body">
            <h3>{{$course->course_name}}</h3>
            <p class="text-muted">Poin maksimal: {{$course->max_score}}poin </p>
                <hr>
                <div class="mb-5">
                    {!! $course->description !!}
                </div>
                <div class="card">
                    <form action="" method="POST" style="margin:20px;" enctype="multipart/form-data">
                        @csrf
                        <label for="course_fileupload">Upload tugas anda</label> <br>
                        <input  type="file" name="course_file" id="course_fileupload" accept=".html"> <br><br>
                        <button type="submit" class="btn btn-success">Upload tugas!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection