<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function index()
    {
        // URL dari endpoint Flask
        $url = 'http://127.0.0.1:5000/data';

        // Ambil data dari Flask
        $response = Http::get($url);

        // Periksa apakah request berhasil
        if ($response->successful()) {
            $data = $response->json();
            $data = json_decode($response->body(), true); // Mendekode JSON menjadi array
        } else {
            // Tangani kasus ketika request gagal
            $data = [];
        }
        return view('dataset.index', ['data' => $data]);
    }
}
