<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasControllerEchanurFadilah extends Controller
{
    private $table = 't_kelas_echanur_fadilah';

    private function rules()
    {
        return [
            'kode_kelas' => 'required|max:10',
            'nama_kelas' => 'required|max:50',
            'tingkat' => 'required|max:5',
            'wali_kelas' => 'required|max:100',
        ];
    }

    public function index()
    {
        $data = DB::table($this->table)->orderBy('id')->get();
        return view('kelas.index_echanur_fadilah', compact('data'));
    }

    public function create()
    {
        return view('kelas.form_echanur_fadilah', ['row' => null]);
    }

    public function store(Request $request)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->insert($v + ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return view('kelas.form_echanur_fadilah', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->where('id', $id)->update($v + ['updated_at' => now()]);
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}