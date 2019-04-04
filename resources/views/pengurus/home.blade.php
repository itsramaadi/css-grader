@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pengurus CSS</h1>
        <p>Atur penggunaan CSS-X Disini!</p>
        <hr>
        
        <div id="buttons" class="mb-3">
           
            <a href="/pengurus/buat-latihan" class="btn btn-success btn-lg mb-2">Buat Latihan</a>
            <a href="/pengurus/review-submisi" class="btn btn-primary btn-lg mb-2">Review Submisi</a>
            <a href="/pengurus/rekap-poin" class="btn btn-primary btn-lg mb-2">Rekap Poin</a>
            <a href="/pengurus/arsip/latihan" class="btn btn-info btn-lg mb-2">Arsip Latihan</a>
            <a href="/pengurus/arsip/submisi" class="btn btn-info btn-lg mb-2">Arsip Submisi</a>
            <a href="/pengurus/tutup-latihan" class="btn btn-danger btn-lg mb-2">Tutup latihan</a>



        </div>

    </div>
@endsection