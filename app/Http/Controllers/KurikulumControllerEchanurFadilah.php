<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumControllerEchanurFadilah extends Controller
{
    private $table = 't_kurikulum_echanur_fadilah';

    private function rules()
    {
        return [
            'kode_kurikulum' => 'required|max:10',
            'nama_kurikulum' => 'required|max:100',
            'tahun' => 'required|digits:4',
            'keterangan' => 'nullable|max:150',
        ];
    }

    public function index()
    {
        $data = DB::table($this->table)->orderBy('id')->get();
        return view('kurikulum.index_echanur_fadilah', compact('data'));
    }

    public function create()
    {
        return view('kurikulum.form_echanur_fadilah', ['row' => null]);
    }

    public function store(Request $request)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->insert($v + ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->route('kurikulum.index')->with('success', 'Data kurikulum berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return view('kurikulum.form_echanur_fadilah', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $v = $request->validate($this->rules());
        DB::table($this->table)->where('id', $id)->update($v + ['updated_at' => now()]);
        return redirect()->route('kurikulum.index')->with('success', 'Data kurikulum berhasil diubah.');
    }

    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
        return redirect()->route('kurikulum.index')->with('success', 'Data kurikulum berhasil dihapus.');
    }
}