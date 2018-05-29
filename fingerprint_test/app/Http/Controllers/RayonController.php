<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rayon;

class RayonController extends Controller
{
    public function index()
    {
      $rayon = Rayon::orderBy('id_rayon', 'asc')->paginate(10);
      return view('master.master', ['data' => $rayon]);
    }
    public function create()
    {
      $rayon = Rayon::get();
      return view('master.createrayon')
      ->with('rayon',$rayon);
    }
    public function store(Request $r)
    {
      $rayon = new Rayon;
      $rayon->id_Rayon = $r->input('id_rayon');
      $rayon->nama_Rayon = $r->input('rayon');
      $rayon->save();
      return redirect()->route('siswa_index');
    }

    public function edit($id_rayon)
    {
      $rayon = Rayon::get();
      $rayon = Rayon::where('id_rayon', $id_rayon)->first();
      return view('master.editrayon', ['data' => $rayon])
      ->with('rayon', $rayon);
    }

    public function update(Request $r, $id_rayon)
    {
      /*$id_Rayon = $r->input('id_Rayon');
      $rayon = Siswa::where('id_Rayon', $id_Rayon)->first();
      $rayon->nama = $r->input('nama');
      $rayon->tempat_lahir = $r->input('lahir');
      $rayon->tanggal_lahir = $r->input('tanggal');
      $rayon->jk = $r->input('jk');
      $rayon->alamat = $r->input('alamat');
      $rayon->id_Rayon = $r->input('Rayon');
      $rayon->id_rayon = $r->input('rayon');
      $rayon->id_rombel = $r->input('rombel');
      $rayon->save();*/
      Rayon::where('id_rayon', $id_rayon)->update([
        'id_rayon' => $r->id_rayon,
        'nama_rayon' => $r->rayon
      ]);
      return redirect()->route('siswa_index');
    }

    public function delete($id_rayon)
    {
      Rayon::where('id_rayon', $id_rayon)->delete();
      return redirect()->route('siswa_index');
    }
}
