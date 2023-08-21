<div class="card mb-4 box-shadow">
    <div class="card-header text-center bg-success">
        <h2 class="my-0"><a class="link " href="{{ route('loketd') }}">
                <h1 class="font-weight-bold text-white">Loket D</h1>
            </a></h2>
    </div>
    <table class="table font-weight-bold">
        @foreach ($loketd as $data)
            <thead>
                <tr>
                    <th colspan="3" class="text-center">
                        <h3 class="font-weight-bold">Nomor Registrasi</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center display-2 font-weight-bold">{{ $data->no_reg }}</th>
                </tr>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="3" class="text-center">
                        <h3 class="font-weight-bold">{{ $data->nm_pasien }}</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center">
                        <h4 class="font-weight-bold">{{ $data->nm_dokter }}</h4>
                    </th>
                </tr>
                <tr>
                    <td class="text-center">
                        <h3 class="font-weight-bold">Jam Mulai : {{ $data->jam_mulai }}</h3>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>

</div>
<div class="card mb-4 box-shadow">
    <div class="card-header text-center bg-success">
        <h2 class="my-0"><a class="link " href="{{ route('lokete') }}">
                <h1 class="font-weight-bold text-white">Loket E</h1>
            </a></h2>
    </div>
    <table class="table font-weight-bold">
        @foreach ($lokete as $data)
            <thead>
                <tr>
                    <th colspan="3" class="text-center">
                        <h3 class="font-weight-bold">Nomor Registrasi</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center display-2 font-weight-bold">{{ $data->no_reg }}</th>
                </tr>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="3" class="text-center">
                        <h3 class="font-weight-bold">{{ $data->nm_pasien }}</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center">
                        <h4 class="font-weight-bold">{{ $data->nm_dokter }}</h4>
                    </th>
                </tr>
                <tr>
                    <td class="text-center">
                        <h3 class="font-weight-bold">Jam Mulai : {{ $data->jam_mulai }}</h3>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
<div class="card mb-4 box-shadow" id="loketF">
    <div class="card-header text-center bg-success">
        <h2 class="my-0"><a class="link " href="{{ route('loketf') }}">
                <h1 class="font-weight-bold text-white">Loket F</h1>
            </a></h2>
    </div>
    <table class="table font-weight-bold">
        @foreach ($loketf as $data)
            <thead>
                <tr>
                    <th colspan="3" class="text-center">
                        <h3 class="font-weight-bold">Nomor Registrasi :</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center display-2 font-weight-bold">{{ $data->no_reg }}</th>
                </tr>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="3" class="text-center">
                        <h3 class="font-weight-bold">{{ $data->nm_pasien }}</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center">
                        <h4 class="font-weight-bold ">{{ $data->nm_dokter }}</h4>
                    </th>
                </tr>
                <tr>
                    <td class="text-center">
                        <h3 class="font-weight-bold">Jam Mulai : {{ $data->jam_mulai }}</h3>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
