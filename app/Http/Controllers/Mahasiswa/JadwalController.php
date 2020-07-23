<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Model\Mahasiswa\KstModel;
use App\Model\Mahasiswa\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class JadwalController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Session::get("login") == false && empty(Session::get('login'))) {
                Redirect::to('mahasiswa/login')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $result = KstModel::getAllJadwal(Session::get("nim"));
        $data['data'] = $result ;
        return view('Mahasiswa/Jadwal/jadwal', $data);
    }

    
}
