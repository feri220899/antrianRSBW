<?php

namespace App\Http\Controllers;

use App\Models\Antripoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loketD extends Controller
{
    public function loketd()
    {
        $dayList = array(
            'Sunday' => 'AKHAD',
            'Monday' => 'SENIN',
            'Tuesday' => 'SELASA',
            'Wednesday' => 'RABU',
            'Thursday' => 'KAMIS',
            'Friday' => 'JUMAT',
            'Saturday' => 'SABTU'
            );
        $hari = $dayList[date('l')];

        // PENDAFTARAN D
        $daftarDokterLoketD = ['D0000038', 'D0000018', 'D0000086'];
        $loketd = DB::table('reg_periksa')
            ->join("jadwal", function($join){
                $join->on('reg_periksa.kd_dokter', '=', 'jadwal.kd_dokter');
            })
            ->join("dokter", function($join){
                $join->on('reg_periksa.kd_dokter', '=', 'dokter.kd_dokter');
            })
            ->join("pasien", function($join){
                $join->on('reg_periksa.no_rkm_medis', '=', 'pasien.no_rkm_medis');
            })
            ->leftJoin("antripoli", function($join){
                $join->on('reg_periksa.no_rawat', '=', 'antripoli.no_rawat');
            })
            ->select('dokter.nm_dokter',
                    'pasien.no_rkm_medis',
                    'pasien.nm_pasien',
                    'reg_periksa.kd_dokter',
                    'reg_periksa.kd_poli',
                    'reg_periksa.no_rawat',
                    'reg_periksa.no_reg',
                    'antripoli.status')
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketD)
            ->where(['reg_periksa.tgl_registrasi'=> date('Y-m-d'), 'jadwal.hari_kerja'=> $hari, 'reg_periksa.kd_pj'=> 'BPJ'])
            // ->whereNotExists(function ($query) {
            //     $query->from('antripoli')
            //           ->whereRaw('reg_periksa.no_rawat=antripoli.no_rawat');
            // })
            ->orderBy('jadwal.jam_mulai','asc')
            ->orderBy('reg_periksa.no_reg','asc')
            ->orderBy('pasien.no_rkm_medis','asc')
            ->get();
        return view('loketd', ['loketd'=>$loketd]);
        // dd($loketd);
    }
    public function inputadaloketd(Request $request)
    {
        $cek = Antripoli::select('no_rawat', 'status')->where('no_rawat', $request->no_rawat)->first();
        if($cek == null){
            $status = '0';
            $request->validate([
                'no_rawat' => 'required|unique:antripoli'
            ]);
            Antripoli::create([
                'kd_dokter' => $request->kd_dokter,
                'kd_poli' => $request->kd_poli,
                'status' => $status,
                'no_rawat' => $request->no_rawat
            ]);
            return redirect('loketd');
        }elseif($cek->status == '1'){
            Antripoli::where('no_rawat', $request->no_rawat)
            ->update(['status' => '0']);
            return redirect('loketd');
        }
        return redirect('loketd');
    }
    public function inputtidakadaloketd(Request $request)
    {
        $cek = Antripoli::select('no_rawat', 'status')->where('no_rawat', $request->no_rawat)->first();
        if($cek == null){
        $status = '1';
        $request->validate([
            'no_rawat' => 'required|unique:antripoli'
        ]);
        Antripoli::create([
            'kd_dokter' => $request->kd_dokter,
            'kd_poli' => $request->kd_poli,
            'status' => $status,
            'no_rawat' => $request->no_rawat
        ]);
        }elseif($cek->status == '0'){
            Antripoli::where('no_rawat', $request->no_rawat)
            ->update(['status' => '1']);
            return redirect('loketd');
        }
        return redirect('loketd');
    }
}
