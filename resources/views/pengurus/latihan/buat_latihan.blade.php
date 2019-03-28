@extends('layouts.app')
@section('stylesheet')
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
@endsection
@section('content')
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-9">

                <div class="card">
                        <div class="card-header">Buat Latihan</div>
                        <div class="card-body">
                            <div class="alert alert-warning"><b>Perhatian!</b> buat latihan sesuai dengan materi yang akan diajarkan di pertemuan!</div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p><b>Tunggu!</b> Ada beberapa error di validasi:</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="" method="POST">
                                @csrf
                                <div class="mt-2">
                                    <label for="exc_title">Judul latihan</label>
                                    <input required class="form-control" type="text" name="exc_title" id="exc_title" placeholder="Masukkan judul latihannya disini!">        
                                </div>
                                <div class="mt-4">
                                        <label for="exc_desc">Deskripsi latihan</label>
                                        <textarea required name="exc_desc" class="form-control" id="exc_desc" cols="30" rows="10"></textarea>        
                                </div>
                                <div class="mt-4">
                                    <label for="exc_pts">Maks Poin</label>
                                    <input required type="text" class="form-control" placeholder="masukkan maks poin" id="exc_pts" name="exc_pts">
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary">Buat latihan</button>
                                </div>
                            </form>
                        </div>
                    </div>

           </div>
       </div>
    </div>
@endsection
@section('scripts')
    <script>
       
        CKEDITOR.replace("exc_desc");
    
    </script>
@endsection