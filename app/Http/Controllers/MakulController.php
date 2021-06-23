<?php

namespace App\Http\Controllers;

use App\Makul;
use Illuminate\Http\Request;
use Alert;

class MakulController extends Controller
{
    public function index()
    {
        $makul = Makul::all(); // secet * from nama_table
        return view('makul.index', compact('makul'));
    }

    public function create()
    {
        return view('makul.create');
    }

    public function store(Request $request)
    {
        Makul::create($request->all());
        alert()->success('Suskes', 'Data Berhasil Disimpan');
        return redirect()->route('makul');
    }

    public function edit($id)
    {
        $makul = Makul::find($id); //select * from nama_table where id = $id
        return view('makul.edit', compact('makul'));
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::find($id);
        $makul->update($request->all());
        toast('Yeay Berhasil Mengedit Data', 'success');
        return redirect()->route('makul');
    }

    public function destroy($id)
    {
        $makul = Makul::find($id);
        $makul->delete();
        toast('Yeay Berhasil Menghapus Data', 'success');

        return redirect()->route('makul');
    }
}
