@extends('user.main_master')
@section('content')
@section('title')
    404 - Səhifə Tapılmadı
@endsection
<section class="bg-primary pt-100 pb-100">
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('frontend/img/404.png') }}" alt="404" class="img-fluid m-auto">
            <h2 class="title-regular-light size-c60 mb-60">Axtardığınız Səhifə Tapılmadı</h2>
            <a href="/" class="btn-gtf-ltl-64">Ana Səhifəyə Get</a>
        </div>
    </div>
</section>
@endsection
