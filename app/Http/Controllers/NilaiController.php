<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Makul;
use App\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['mahasiswa', 'makul'])->get(); // secet * from nama_table
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $makul = Makul::all();
        return view('nilai.create', compact('mahasiswa', 'makul'));
    }

    public function store(Request $request)
    {
        Nilai::create($request->all());
        alert()->success('Suskes', 'Data Berhasil Disimpan');
        return redirect()->route('nilai');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::all();
        $makul = Makul::all();
        $nilai = Nilai::find($id); //select * from nama_table where id = $id
        return view('nilai.edit', compact('nilai', 'mahasiswa', 'makul'));
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::find($id);
        $nilai->update($request->all());
        toast('Yeay Berhasil Mengedit Data', 'success');
        return redirect()->route('nilai');
    }

    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();
        toast('Yeay Berhasil Menghapus Data', 'success');

        return redirect()->route('nilai');
    }
}
