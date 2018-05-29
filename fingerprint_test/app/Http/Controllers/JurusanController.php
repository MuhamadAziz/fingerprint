<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Jurusan;
use App\Rayon;
use App\Rombel;

class JurusanController extends Controller
{
    public function index()
    {
      $jurusan = Jurusan::orderBy('id_jurusan', 'asc')->paginate(10);
      return view('master.jurusan', ['data' => $jurusan]);
    }
    public function create()
    {
      $jurusan = Jurusan::get();
      return view('master.createjurusan')
      ->with('jurusan',$jurusan);
    }
    public function store(Request $r)
    {
      $jurusan = new Jurusan;
      $jurusan->id_jurusan = $r->input('id_jurusan');
      $jurusan->nama_jurusan = $r->input('jurusan');
      $jurusan->save();
      return redirect()->route('jurusan_index');
    }

    public function edit($id_jurusan)
    {
      $jurusan = Jurusan::get();
      $jurusan = Jurusan::where('id_jurusan', $id_jurusan)->first();
      return view('master.editjurusan', ['data' => $jurusan])
      ->with('jurusan', $jurusan);
    }

    public function update(Request $r, $id_jurusan)
    {
      /*$id_jurusan = $r->input('id_jurusan');
      $jurusan = Siswa::where('id_jurusan', $id_jurusan)->first();
      $jurusan->nama = $r->input('nama');
      $jurusan->tempat_lahir = $r->input('lahir');
      $jurusan->tanggal_lahir = $r->input('tanggal');
      $jurusan->jk = $r->input('jk');
      $jurusan->alamat = $r->input('alamat');
      $jurusan->id_jurusan = $r->input('jurusan');
      $jurusan->id_rayon = $r->input('rayon');
      $jurusan->id_rombel = $r->input('rombel');
      $jurusan->save();*/
      Jurusan::where('id_jurusan', $id_jurusan)->update([
        'id_jurusan' => $r->id_jurusan,
        'nama_jurusan' => $r->jurusan
      ]);
      return redirect()->route('jurusan_index');
    }

    public function delete($id_jurusan)
    {
      Jurusan::where('id_jurusan', $id_jurusan)->delete();
      return redirect()->route('jurusan_index');
    }
}
