<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::latest()->get();

        return Inertia::render('Pegawai/Index', [
            'pegawais' => $pegawais
        ]);
    }

    public function create()
    {
        return Inertia::render('Pegawai/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai'  => 'required',
            'jabatan'       => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
        ]);

        $pegawai = Pegawai::create([
            'nama_pegawai'  => $request->nama_pegawai,
            'jabatan'       => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir'     => $request->tgl_lahir,
            'alamat'        => $request->alamat
        ]);

        if($pegawai) {
            return Redirect::route('pegawais.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    public function edit(Pegawai $pegawai)
    {
        return Inertia::render('Pegawai/Edit', [
            'pegawai' => $pegawai
        ]);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama_pegawai'  => 'required',
            'jabatan'       => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
        ]);

        $pegawai->update([
            'nama_pegawai'  => $request->nama_pegawai,
            'jabatan'       => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir'     => $request->tgl_lahir,
            'alamat'        => $request->alamat
        ]);

        if($pegawai) {
            return Redirect::route('pegawais.index')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrfail($id);

        $pegawai->delete();

        if($pegawai) {
            return Redirect::route('pegawais.index')->with('message', 'Data Berhasil Dihapus!');
        }
    }
}
