<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajaranControllerEchanurFadilah extends Controller
{
    private $table = 't_pelajaran_echanur_fadilah';

    public function index()
    {
        $data = DB::table($this->table)->orderBy('id')->get();
        return view('pelajaran.index_echanur_fadilah', compact('data'));
    }

    public function create()
    {
        return view('pelajaran.form_echanur_fadilah', ['row' => null]);
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'kode_pelajaran' => 'required|max:10',
            'nama_pelajaran' => 'required|max:100',
        ]);
        DB::table($this->table)->insert($v + ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->route('pelajaran.index')->with('success', 'Data pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return view('pelajaran.form_echanur_fadilah', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $v = $request->validate([
            'kode_pelajaran' => 'required|max:10',
            'nama_pelajaran' => 'required|max:100',
        ]);
        DB::table($this->table)->where('id', $id)->update($v + ['updated_at' => now()]);
        return redirect()->route('pelajaran.index')->with('success', 'Data pelajaran berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
        return redirect()->route('pelajaran.index')->with('success', 'Data pelajaran berhasil dihapus.');
    }
}