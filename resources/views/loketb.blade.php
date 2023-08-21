@extends('layout.layout')
@section('title', 'Loket B')

@section('konten')
    <div class="col">
        <div class="container d-flex item-center mt-4">
            <button class="p-3 mr-2" style="background-color: #30E3DF"></button>
            <h4 class="mr-4"> : Ada</h4>
            <button class="p-3 mr-2" style="background-color: #F97B22"></button>
            <h4 class="mr-4"> : Tidak Ada</h4>
            <button class="p-3 mr-2" style="background-color: #ffffff"></button>
            <h4> : Belum Terpanggil</h4>
        </div>
    </div>
    <div class="card-deck mb-3 mt-4">
        <div class="col-lg-1">
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header text-center">
                <h2 class="my-0 font-weight-bold">Petugas Loket B</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NAMA</th>
                        <th scope="col">NO RM</th>
                        <th scope="col">NO REG</th>
                        <th scope="col">DR</th>
                        <th scope="col">kd dokter</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loketb as $data)
                        <tr
                            @if ($data->status === '0') style="background-color:#30E3DF;"
                    @elseif($data->status === '1')
                      style="background-color:#F97B22;" @endif>
                            <td>{{ $data->nm_pasien }}</td>
                            <td>{{ $data->no_rkm_medis }}</td>
                            <td>{{ $data->no_reg }}</td>
                            <td>{{ $data->nm_dokter }}</td>
                            <td>{{ $data->kd_dokter }}</td>
                            <td class="text-center d-flex justify-content-center">
                                <audio id="{{ $data->no_reg }}" src="/sound/noreg/{{ $data->no_reg }}.mp3"></audio>
                                <audio id="{{ $data->kd_dokter }}" src="/sound/dokter/{{ $data->kd_dokter }}.mp3"></audio>
                                <audio id="loketb" src="/sound/loket/loketb.mp3"></audio>
                                <button onclick="playSequentialSounds(['{{ $data->no_reg }}','{{ $data->kd_dokter }}','loketb'])"
                                    class="btn btn-primary" role="button" aria-disabled="true">Panggil</a>
                                    <form action="{{ route('inputadaloketb') }}" method="post">
                                        @csrf
                                        <input type="text" hidden name="kd_dokter" id=""
                                            value="{{ $data->kd_dokter }}">
                                        <input type="text" hidden name="kd_poli" id=""
                                            value="{{ $data->kd_poli }}">
                                        <input type="text" hidden name="no_rawat" id=""
                                            value="{{ $data->no_rawat }}">
                                        <button type="submit" class="btn btn-success mx-2" role="button"
                                            aria-disabled="true">Ada</a>
                                    </form>
                                    <form action="{{ route('inputtidakadaloketb') }}" method="post">
                                        @csrf
                                        <input type="text" hidden name="kd_dokter" id=""
                                            value="{{ $data->kd_dokter }}">
                                        <input type="text" hidden name="kd_poli" id=""
                                            value="{{ $data->kd_poli }}">
                                        <input type="text" hidden name="no_rawat" id=""
                                            value="{{ $data->no_rawat }}">
                                        <button type="submit" class="btn btn-danger" role="button"
                                            aria-disabled="true">Tidak Ada</a>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-1">
        </div>
    </div>
    <script>
        function playSequentialSounds(ids) {
            var currentIndex = 0;

            function playNextSound() {
                if (currentIndex >= ids.length) {
                    return; // Jika sudah mencapai akhir daftar suara, keluar dari fungsi
                }
                var audio = document.getElementById(ids[currentIndex]);
                audio.play();
                currentIndex++;
                audio.onended = playNextSound; // Setelah suara selesai, panggil suara berikutnya
            }
            playNextSound();
        }
    </script>
@endsection
