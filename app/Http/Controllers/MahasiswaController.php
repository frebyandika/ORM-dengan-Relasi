<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::get();
        $paginate = Mahasiswa::orderBy('id', 'asc')->paginate(3);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate])->
        with('i', (request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil Ditambahkan');
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->first();
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);

        Mahasiswa::find($nim)->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil Update');
    }

    public function destroy($nim)
    {
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diahpus');
    }
}
