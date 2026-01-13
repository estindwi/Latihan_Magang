<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard', [
            'totalPasien' => Pasien::count(),
            'pasienHariIni' => Pasien::whereDate('created_at', today())->count(),
            'dokterAktif' => Dokter::count(),
        ]);
    }
}