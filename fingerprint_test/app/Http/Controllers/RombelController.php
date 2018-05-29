<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rombel;
use App\Jurusan;

class RombelController extends Controller
{
    public function index()
    {

      $rombel = Rombel::join('jurusan', 'rombel.id_jurusan', '=', 'jurusan.id_jurusan')->orderBy('id_rombel', 'asc')->paginate(10);
      return view('master.master', ['data' => $rombel]);
    }
    public function create()
    {
      $jurusan = Jurusan::get();
      $rombel = Rombel::get();
      return view('master.createrombel')
      ->with('rombel',$rombel)
      ->with('jurusan', $jurusan);
    }
    public function store(Request $r)
    {
      $rombel = new Rombel;
      $rombel->id_rombel = $r->input('id_rombel');
      $rombel->id_jurusan = $r->input('id_jurusan');
      $rombel->rombel = $r->input('rombel');
      $rombel->save();
      return redirect()->route('siswa_index');
    }

    public function edit($id_rombel)
    {
      $jurusan = Jurusan::get();
      $rombel = Rombel::get();
      $rombel = Rombel::where('id_rombel', $id_rombel)->first();
      return view('master.editrombel', ['data' => $rombel])
      ->with('rombel', $rombel)
      ->with('jurusan', $jurusan);
    }

    public function update(Request $r, $id_rombel)
    {
      /*$id_rombel = $r->input('id_rombel');
      $rombel = Siswa::where('id_rombel', $id_rombel)->first();
      $rombel->nama = $r->input('nama');
      $rombel->tempat_lahir = $r->input('lahir');
      $rombel->tanggal_lahir = $r->input('tanggal');
      $rombel->jk = $r->input('jk');
      $rombel->alamat = $r->input('alamat');
      $rombel->id_rombel = $r->input('rombel');
      $rombel->id_rombel = $r->input('rombel');
      $rombel->id_rombel = $r->input('rombel');
      $rombel->save();*/
      Rombel::where('id_rombel', $id_rombel)->update([
        'id_rombel' => $r->id_rombel,
        'id_jurusan' => $r->jurusan,
        'rombel' => $r->rombel
      ]);
      return redirect()->route('siswa_index');
    }

    public function delete($id_rombel)
    {
      Rombel::where('id_rombel', $id_rombel)->delete();
      return redirect()->route('siswa_index');
    }
}
