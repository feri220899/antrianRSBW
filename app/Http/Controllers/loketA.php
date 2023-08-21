<?php

namespace App\Http\Controllers;

use App\Models\Antripoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loketA extends Controller
{
    public function loketa()
    {
        $dayList = array(
            'Sunday' => 'MINGGU',
            'Monday' => 'SENIN',
            'Tuesday' => 'SELASA',
            'Wednesday' => 'RABU',
            'Thursday' => 'KAMIS',
            'Friday' => 'JUMAT',
            'Saturday' => 'SABTU'
            );
        $hari = $dayList[date('l')];

        // PENDAFTARAN B
        $daftarDokterLoketA = ['D0000031', 'D0000014', 'D0000072', 'D0000092', 'D0000051', 'D0000020', 'D0000071', 'D0000001', 'D0000021'];
        // $daftarDokterLoketB = ['D0000010','D0000009','D0000004'];
        $loketa = DB::table('reg_periksa')
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
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketA)
            ->where(['reg_periksa.tgl_registrasi'=> date('Y-m-d'), 'jadwal.hari_kerja'=> $hari, 'reg_periksa.kd_pj'=> 'BPJ'])
            // ->whereNotExists(function ($query) {
            //     $query->from('antripoli')
            //           ->whereRaw('reg_periksa.no_rawat=antripoli.no_rawat');
            // })
            ->orderBy('jadwal.jam_mulai','asc')
            ->orderBy('reg_periksa.no_reg','asc')
            ->orderBy('pasien.no_rkm_medis','asc')
            ->get();
        return view('loketa', ['loketa'=>$loketa]);
        // dd($loketd);
    }

    public function inputadaloketa(Request $request)
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
            return redirect('loketa');
        }elseif($cek->status == '1'){
            Antripoli::where('no_rawat', $request->no_rawat)
            ->update(['status' => '0']);
            return redirect('loketa');
        }
        return redirect('loketa');
    }
    public function inputtidakadaloketa(Request $request)
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
            return redirect('loketa');
        }
        return redirect('loketa');
    }
}
