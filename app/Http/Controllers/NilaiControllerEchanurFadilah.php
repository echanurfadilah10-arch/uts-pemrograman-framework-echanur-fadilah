<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiControllerEchanurFadilah extends Controller
{
    private $table = 't_nilai_echanur_fadilah';

    private function rules()
    {
        return [
            'siswa_id' => 'required|exists:t_siswa_echanur_fadilah,id',
            'pelajaran_id' => 'required|exists:t_pelajaran_echanur_fadilah,id',
            'nilai_tugas' => 'required|integer|min:0|max:100',
            'nilai_uts' => 'required|integer|min:0|max:100',
            'nilai_uas' => 'required|integer|min:0|max:100',
        ];
    }

    private function dropdown()
    {
        return [
            'siswa' => DB::table('t_siswa_echanur_fadilah')->orderBy('nama_siswa')->get(),
            'pelajaran' => DB::table('t_pelajaran_echanur_fadilah')->orderBy('nama_pelajaran')->get(),
        ];
    }

    public function index()
    {
        $data = DB::table($this->table . ' as n')
            ->join('t_siswa_echanur_fadilah as s', 's.id', '=', 'n.siswa_id')
            ->join('t_pelajaran_echanur_fadilah as p', 'p.id', '=', 'n.pelajaran_id')
            ->select('n.*', 's.nama_siswa', 'p.nama_pelajaran')
            ->orderBy('n.id')
            ->get();
        return view('nilai.index_echanur_fadilah', compact('data'));
    }

    public function create()
    {
        return view('nilai.form_echanur_fadilah', ['row' => null] + $this->dropdown());
    }

    public function store(Request $request)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->insert($v + ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return view('nilai.form_echanur_fadilah', ['row' => $row] + $this->dropdown());
    }

    public function update(Request $request, $id)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->where('id', $id)->update($v + ['updated_at' => now()]);
        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }
}