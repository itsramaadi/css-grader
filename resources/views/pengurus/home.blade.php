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
        <a href="/pengurus/verifikasi-user" class="btn btn-success btn-lg mb-2">Verifikasi User</a>
        <a href="/pengurus/tutup-latihan" class="btn btn-danger btn-lg mb-2">Tutup latihan</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6">

            <div class="card-deck">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Belum di Verifikasi
                                </h6>

                                <span class="h2 mb-0">
                                    {{$notverified}}
                                </span>


                            </div>
                            <div class="col-auto">

                                <span class="h2 fas fa-user-times text-muted mb-0"></span>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
    
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Total Anggota
                                    </h6>
    
                                    <span class="h2 mb-0">
                                        {{$totaluser}}
                                    </span>
    
    
                                </div>
                                <div class="col-auto">
    
                                    <span class="h2 fas fa-user text-muted mb-0"></span>
    
                                </div>
                            </div>
    
                        </div>
                    </div>



            </div>

        </div>
        <div class="col-sm-12 col-md-6">
            

            <div class="card-deck">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Total tugas
                                </h6>

                                <span class="h2 mb-0">
                                    {{$alltask}}
                                </span>


                            </div>
                            <div class="col-auto">

                                <span class="h2 fas fa-clipboard-list text-muted mb-0"></span>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
    
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                       Belum Diperiksa
                                    </h6>
    
                                    <span class="h2 mb-0">
                                        {{$notchecked}}
                                    </span>
    
    
                                </div>
                                <div class="col-auto">
    
                                    <span class="h2 fas fa-clipboard-check text-muted mb-0"></span>
    
                                </div>
                            </div>
    
                        </div>
                    </div>



            </div>



        </div>
    </div>

</div>
@endsection
