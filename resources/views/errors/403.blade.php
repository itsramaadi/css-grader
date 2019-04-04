@extends('layouts.empty')

@section('content')
    <div class="d-flex pt-4 justify-content-center align-items-center">
            <img height="300" width="320" src="https://dashkit.goodthemes.co/assets/img/illustrations/lost.svg" alt="">
    </div>
    <div class="mt-4 d-flex justify-content-center align-items-center">
        <h1 style="font-size:40px;">403 <i class="fas fa-angry"></i></h1>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <p style="font-size:20px;">{!!$exception->getMessage()!!}</p>
    </div>
    <div class="d-flex justify-content-center">
    <a style="color:grey;" class="btn btn-outline-secondary mb-2" href="{{ URL::previous() }}">Balik lagi bos, biar ga error <i class="fas fa-grin-squint-tears"></i></a>
    </div>
@endsection