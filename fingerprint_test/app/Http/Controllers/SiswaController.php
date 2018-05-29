<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Jurusan;
use App\Rayon;
use App\Rombel;

class SiswaController extends Controller
{
    public function index()
    {
      $rayon = Rayon::orderBy('id_rayon', 'asc')->get();
      $rombel = Rombel::join('jurusan', 'rombel.id_jurusan', '=', 'jurusan.id_jurusan')->orderBy('id_rombel', 'asc')->get();
      $jurusan = Jurusan::orderBy('id_jurusan', 'asc')->get();
      $siswa = Siswa::join('qw_rombel','qw_rombel.id_rombel','=','siswa.id_rombel')->join('rayon','rayon.id_rayon','siswa.id_rayon')->orderBy('nis', 'asc')->get();
      return view('master.master', ['data' => $siswa])
      ->with('jurusan', $jurusan)
      ->with('rombel', $rombel)
      ->with('rayon', $rayon);
    }
    public function create()
    {
      $jurusan = Jurusan::get();
      $rombel = Rombel::get();
      $rayon = Rayon::get();
      return view('master.createsiswa')
      ->with('jurusan', $jurusan)
      ->with('rayon', $rayon)
      ->with('rombel', $rombel);
    }
    public function store(Request $r)
    {
      $siswa = new Siswa;
      $siswa->nis = $r->input('nis');
      $siswa->nama = $r->input('nama');
      // $siswa->port = $r->input('port');
      $siswa->tempat_lahir = $r->input('lahir');
      $siswa->tanggal_lahir = $r->input('tanggal');
      $siswa->jk = $r->input('jk');
      $siswa->alamat = $r->input('alamat');
      $siswa->id_rayon = $r->input('rayon');
      $siswa->id_rombel = $r->input('rombel');
      $siswa->save();
      return redirect()->route('siswa_index');
    }

    public function edit($nis)
    {
      $siswa = Siswa::get();
      $jurusan = Jurusan::get();
      $rombel = Rombel::get();
      $rayon = Rayon::get();
      $siswa = Siswa::where('nis', $nis)->first();
      return view('master.editsiswa', ['data' => $siswa])
      ->with('siswa', $siswa)
      ->with('jurusan', $jurusan)
      ->with('rayon', $rayon)
      ->with('rombel', $rombel);
    }

    public function update(Request $r, $nis)
    {
      /*$nis = $r->input('nis');
      $siswa = Siswa::where('nis', $nis)->first();
      $siswa->nama = $r->input('nama');
      $siswa->tempat_lahir = $r->input('lahir');
      $siswa->tanggal_lahir = $r->input('tanggal');
      $siswa->jk = $r->input('jk');
      $siswa->alamat = $r->input('alamat');
      $siswa->id_jurusan = $r->input('jurusan');
      $siswa->id_rayon = $r->input('rayon');
      $siswa->id_rombel = $r->input('rombel');
      $siswa->save();*/
      Siswa::where('nis', $nis)->update([
        'nis' => $r->nis,
        'nama' => $r->nama,
        'id_rayon' => $r->rayon,
        'id_rombel' => $r->rombel
      ]);
      return redirect()->route('siswa_index');
    }

    public function delete($nis)
    {
      Siswa::where('nis', $nis)->delete();
      return redirect()->route('siswa_index');
    }
}
