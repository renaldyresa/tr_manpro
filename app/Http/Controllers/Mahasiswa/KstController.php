<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Model\Mahasiswa\KstModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class KstController extends Controller
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
        $result = KstModel::getAll(Session::get("nim"));
        $data['data'] = $result ;       
        return view('Mahasiswa/Kartu/kartu', $data);
    }
}
