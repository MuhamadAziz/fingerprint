<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
use App\Siswa;
use App\Rombel;
use App\Ketidakhadiran;

class LaporanController extends Controller
{
	public function laporan_bulanan($rombel,$bulan,$tahun){
		$siswa = Siswa::join('rayon','rayon.id_rayon','=','siswa.id_rayon')->join('rombel','rombel.id_rombel','=','siswa.id_rombel')->where('siswa.id_rombel',$rombel)->get();
		return view('laporan/laporan_bulanan')
		->with('rombel',$rombel)
		->with('tahun',$tahun)
		->with('bulan',$bulan)
		->with('siswa',$siswa);
	}

	public function laporan_bulanan_siswa($nis){
		$siswa = Siswa::join('rayon','rayon.id_rayon','=','siswa.id_rayon')->join('rombel','rombel.id_rombel','=','siswa.id_rombel')->where('siswa.id_rombel',$rombel)->get();
		return view('laporan/laporan_harian')
		->with('rombel',$rombel)
		->with('tanggal',$tanggal)
		->with('siswa',$siswa);
	}

	public function laporan_harian($rombel,$tanggal){
		$siswa = Siswa::join('rayon','rayon.id_rayon','=','siswa.id_rayon')->join('rombel','rombel.id_rombel','=','siswa.id_rombel')->where('siswa.id_rombel',$rombel)->get();
		return view('laporan/laporan_harian')
		->with('rombel',$rombel)
		->with('tanggal',$tanggal)
		->with('siswa',$siswa);
	}

	public function laporan_harian_tampil(Request $request){
		return redirect('/laporan_harian/'.$request->input_rombel.'/'.$request->input_tanggal);
	}

	public function laporan_bulanan_tampil(Request $request){
		return redirect('/laporan_bulanan/'.$request->input_rombel.'/'.$request->input_bulan.'/'.$request->input_tahun);
	}

	public function print_harian($rombel,$tanggal){
		$siswa = Siswa::join('rayon','rayon.id_rayon','=','siswa.id_rayon')->join('rombel','rombel.id_rombel','=','siswa.id_rombel')->where('siswa.id_rombel',$rombel)->get();
		return view('laporan/print_harian')
		->with('rombel',$rombel)
		->with('tanggal',$tanggal)
		->with('siswa',$siswa);
	}

	public function laporan_kehadiran(){
		$rombel = Rombel::get();
		return view('laporan/laporan_kehadiran')->with('rombel',$rombel);
	}
}
