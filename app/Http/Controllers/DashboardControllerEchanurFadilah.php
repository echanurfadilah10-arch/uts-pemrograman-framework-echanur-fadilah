<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardControllerEchanurFadilah extends Controller
{
    public function index()
    {
        $total = [
            'siswa'     => DB::table('t_siswa_echanur_fadilah')->count(),
            'pelajaran' => DB::table('t_pelajaran_echanur_fadilah')->count(),
            'kurikulum' => DB::table('t_kurikulum_echanur_fadilah')->count(),
            'kelas'     => DB::table('t_kelas_echanur_fadilah')->count(),
            'jadwal'    => DB::table('t_jadwal_echanur_fadilah')->count(),
            'nilai'     => DB::table('t_nilai_echanur_fadilah')->count(),
        ];
        return view('dashboard_echanur_fadilah', compact('total'));
    }
}