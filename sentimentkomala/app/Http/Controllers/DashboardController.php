<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predictions;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalUsers = User::count();
        $totalPredictions = Predictions::count();

        // Ambil data untuk chart
        $predictionsData = Predictions::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date')
            ->toArray();

        return view('admin.index', compact('totalUsers', 'totalPredictions', 'predictionsData'));
    }
}
