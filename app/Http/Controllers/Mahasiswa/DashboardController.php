<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
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
        return view('Mahasiswa/dashboard');
    }
}
