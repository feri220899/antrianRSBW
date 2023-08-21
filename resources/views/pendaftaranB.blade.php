@extends('layout.layoutpendaftaran')
@section('title', 'PENDAFTARAN 1')

@section('konten')
    <div class="d-flex justify-content-between align-items-center container-fluid mt-3">
        <img src="/img/rs.png" width="140px" height="110px" alt="" srcset="">
        <div class="pricing-header ">
            <h1 class="display-4 font-weight-bold">PENDAFTARAN B</h1>
        </div>
        <img src="/img/bpjs.png" width="280px" height="50px" alt="" srcset="">
    </div>
    <hr>
    <div class="card-deck mb-3" id="pendaftaran1">

    </div>
    <script>
        // Untuk Get data realtime
        $(document).ready(function() {
            getData()
        });
        function getData() {
            $.get("{{ url('viewpendaftaranB') }}", {}, function(data, status) {
                $("#pendaftaran1").html(data);
                getData()
            })
        }setInterval(function () {getData()}, 1);
    </script>
@endsection
