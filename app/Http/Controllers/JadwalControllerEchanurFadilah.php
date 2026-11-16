<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalControllerEchanurFadilah extends Controller
{
    private $table = 't_jadwal_echanur_fadilah';

    private function rules()
    {
        return [
            'kelas_id' => 'required|exists:t_kelas_echanur_fadilah,id',
            'pelajaran_id' => 'required|exists:t_pelajaran_echanur_fadilah,id',
            'hari' => 'required|max:10',
            'jam_mulai' => 'required|max:5',
            'jam_selesai' => 'required|max:5',
        ];
    }

    private function dropdown()
    {
        return [
            'kelas' => DB::table('t_kelas_echanur_fadilah')->orderBy('nama_kelas')->get(),
            'pelajaran' => DB::table('t_pelajaran_echanur_fadilah')->orderBy('nama_pelajaran')->get(),
        ];
    }

    public function index()
    {
        $data = DB::table($this->table . ' as j')
            ->join('t_kelas_echanur_fadilah as k', 'k.id', '=', 'j.kelas_id')
            ->join('t_pelajaran_echanur_fadilah as p', 'p.id', '=', 'j.pelajaran_id')
            ->select('j.*', 'k.nama_kelas', 'p.nama_pelajaran')
            ->orderBy('j.id')
            ->get();
        return view('jadwal.index_echanur_fadilah', compact('data'));
    }

    public function create()
    {
        return view('jadwal.form_echanur_fadilah', ['row' => null] + $this->dropdown());
    }

    public function store(Request $request)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->insert($v + ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return view('jadwal.form_echanur_fadilah', ['row' => $row] + $this->dropdown());
    }

    public function update(Request $request, $id)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->where('id', $id)->update($v + ['updated_at' => now()]);
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus.');
    }
}