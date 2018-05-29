<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Auth::user()->level;
        switch ($level) {
            case 'admin':
                return redirect('/siswa');
                break;

            case 'petugas_piket':
                return redirect('/absensi');
                break;
            
            default:
                return redirect('/absensi');
                break;
        }
    }
    public function index1()
    {
        return view('templates.dashboard');
    }
    public function about()
    {
        return view('templates.about');
    }
    public function guru()
    {
        return view('templates.dashguru');
    }
    public function credit()
    {
        return view('templates.credit');
    }
}