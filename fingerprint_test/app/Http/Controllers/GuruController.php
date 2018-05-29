<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function index()
    {
      $guru = Guru::get();
      return view('guru.data_guru', ['data' => $guru]);
    }
    public function create()
    {
      return view('guru.create');
    }
    public function store(Request $r)
    {
      $guru = new Guru;
      $guru->nip = $r->input('nip');
      $guru->nama = $r->input('nama');
      $guru->save();
      return redirect()->route('guru_index');
    }

    public function edit($nip)
    {
      $guru = Guru::get();
      $guru = Guru::where('nip', $nip)->first();
      return view('guru.edit', ['data' => $guru]);
    }
    public function update(Request $r, $nip)
    {
      /*$nip = $r->input('nip');
      $guru = guru::where('nip', $nip)->first();
      $guru->nama = $r->input('nama');
      $guru->tempat_lahir = $r->input('lahir');
      $guru->tanggal_lahir = $r->input('tanggal');
      $guru->jk = $r->input('jk');
      $guru->alamat = $r->input('alamat');
      $guru->id_jurusan = $r->input('jurusan');
      $guru->id_rayon = $r->input('rayon');
      $guru->id_rombel = $r->input('rombel');
      $guru->save();*/
      Guru::where('nip', $nip)->update([
        'nip' => $r->nip,
        'nama' => $r->nama
      ]);
      return redirect()->route('guru_index');
    }

    public function delete($nip)
    {
      Guru::where('nip', $nip)->delete();
      return redirect()->route('guru_index');
    }
}
