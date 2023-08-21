<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranBController extends Controller
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

    public function pendaftaranB()
    {
        return view('pendaftaranB');
    }

    function viewpendaftaranB(){
        $hari = $this->getHari();
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
                    'jadwal.jam_mulai',
                    'reg_periksa.no_rawat',
                    'reg_periksa.no_reg',
                    'pasien.nm_pasien')
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketD)
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

        // PENDAFTARAN E
        $daftarDokterLoketE = ['D0000043', 'D0000028', 'D0000100'];
        $lokete = DB::table('reg_periksa')
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
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketE)
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

        // PENDAFTARAN F
        $daftarDokterLoketF = ['D0000063', 'D0000097', 'D0000073', 'D0000022'];
        // $daftarDokterLoketF = ['D0000010','D0000009','D0000004'];
        $loketf = DB::table('reg_periksa')
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
            ->whereIn('reg_periksa.kd_dokter',$daftarDokterLoketF)
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

        return view('componenpendafataran.viewpendaftaranB', ['loketd'=>$loketd, 'lokete'=>$lokete, 'loketf'=>$loketf]);
    }
}
