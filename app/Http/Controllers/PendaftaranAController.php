<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranAController extends Controller
{
    public function __construct() {
        $this->dayList = array(
            'Sunday' => 'AKHAD',
            'Monday' => 'SENIN',
            'Tuesday' => 'SELASA',
            'Wednesday' => 'RABU',
            'Thursday' => 'KAMIS',
            'Friday' => 'JUMAT',
            'Saturday' => 'SABTU'
        );
    }
    private function getHari() {
        return $this->dayList[date('l')];
    }
    public function pendaftaranA()
    {
        return view('pendaftaranA');
    }

    function viewpendaftaranA() {
        $hari = $this->getHari();
        // PENDAFTARAN A
        $daftarDokterLoketA = ['D0000031', 'D0000014', 'D0000072', 'D0000092', 'D0000051', 'D0000020', 'D0000071', 'D0000001', 'D0000021'];
        // $daftarDokterLoketA = ['D0000010','D0000009','D0000004'];
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
                    'jadwal.jam_mulai',
                    'reg_periksa.no_rawat',
                    'reg_periksa.no_reg',
                    'pasien.nm_pasien')
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketA)
            ->where(['reg_periksa.tgl_registrasi'=> date('Y-m-d'), 'jadwal.hari_kerja'=> $hari, 'reg_periksa.kd_pj'=> 'BPJ'])
            ->whereNotExists(function ($query) {
                $query->from('antripoli')
                      ->whereRaw('reg_periksa.no_rawat = antripoli.no_rawat');
            })
            ->orderBy('jadwal.jam_mulai','asc')
            ->orderBy('reg_periksa.no_reg','asc')
            ->orderBy('pasien.no_rkm_medis','asc')
            ->take(1)
            ->get();

        // PENDAFTARAN B
        $daftarDokterLoketB = ['D0000032', 'D0000012', 'D0000015', 'D0000082', 'D0000044', 'D0000016', 'D0000019', 'D0000064', 'D0000046'];
        // $daftarDokterLoketC = ['D0000010','D0000009','D0000004'];
        $loketb = DB::table('reg_periksa')
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
                    'jadwal.jam_mulai',
                    'reg_periksa.no_rawat',
                    'reg_periksa.no_reg',
                    'pasien.nm_pasien')
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketB)
            ->where(['reg_periksa.tgl_registrasi'=> date('Y-m-d'), 'jadwal.hari_kerja'=> $hari, 'reg_periksa.kd_pj'=> 'BPJ'])
            ->whereNotExists(function ($query) {
                $query->from('antripoli')
                      ->whereRaw('reg_periksa.no_rawat = antripoli.no_rawat');
            })
            ->orderBy('jadwal.jam_mulai','asc')
            ->orderBy('reg_periksa.no_reg','asc')
            ->orderBy('pasien.no_rkm_medis','asc')
            ->take(1)
            ->get();

        return view('componenpendafataran.viewpendaftaranA', ['loketa'=>$loketa, 'loketb'=>$loketb]);
    }
}
