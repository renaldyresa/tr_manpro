<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\DosenModel;
use App\Model\Admin\FakultasModel;
use App\Model\Admin\MahasiswaModel;
use App\Model\Admin\ProgdiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Session::get("login") == false && empty(Session::get('login'))) {
                Redirect::to('admin/login')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data['mahasiswa'] = MahasiswaModel::countAll();
        $data['dosen'] = DosenModel::countAll();
        $data['fakultas'] = FakultasModel::countAll();
        $data['progdi'] = ProgdiModel::countAll();
        return view('admin/dashboard', $data);
    }
}
