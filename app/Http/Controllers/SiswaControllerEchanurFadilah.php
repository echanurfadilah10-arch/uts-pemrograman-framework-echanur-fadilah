<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaControllerEchanurFadilah extends Controller
{
    private $table = 't_siswa_echanur_fadilah';

    public function index()
    {
        $data = DB::table($this->table)->orderBy('id')->get();
        return view('siswa.index_echanur_fadilah', compact('data'));
    }

    public function create()
    {
        return view('siswa.form_echanur_fadilah', ['row' => null]);
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'nis' => 'required|max:10',
            'nama_siswa' => 'required|max:100',
        ]);
        DB::table($this->table)->insert($v + ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return view('siswa.form_echanur_fadilah', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $v = $request->validate([
            'nis' => 'required|max:10',
            'nama_siswa' => 'required|max:100',
        ]);
        DB::table($this->table)->where('id', $id)->update($v + ['updated_at' => now()]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}