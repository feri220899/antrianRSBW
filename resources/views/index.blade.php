@extends('layout.layout')
@section('title', 'PENDAFTARAN 1')

@section('konten')
    <div class="container">
            <div class="d-flex align-items-center justify-content-center" style="height: 600px;">
                <a href="{{route('pendaftaranA')}}">
                    <div class="card bg-primary mx-2">
                        <div class="card-body text-center mx-5 text-light">
                            <p class="card-text display-4 font-weight-bold">LOKET</p>
                            <p class="card-text font-weight-bold"><h2>PENDAFTARAN A</h2></p>
                        </div>
                    </div>
                </a>
                <a href="{{route('pendaftaranB')}}">
                    <div class="card bg-primary mx-2">
                        <div class="card-body text-center mx-5 text-light">
                            <p class="card-text display-4 font-weight-bold">LOKET</p>
                            <p class="card-text font-weight-bold"><h2>PENDAFTARAN B</h2></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
@endsection
