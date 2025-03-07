<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class QuranController extends Controller
{
    public function index(){
        $client = new Client();
        $url = "https://api.myquran.com/v2/quran/surat/semua";

        $response = $client->request('GET', $url);
        $body = $response->getBody()->getContents();
        $data = json_decode($body);

        $surahList = $data->data;

        return view('quran.index', compact('surahList'));
    }

    public function showSurat(int $surat, int $jumlahAyat, Request $request)
    {
        $client = new Client();

        // Ambil halaman dari request, default 1
        $page = max(1, (int) $request->query('page', 1)); // Pastikan halaman minimal 1
        $perPage = 30; // Jumlah ayat per halaman

        // Hitung jumlah total halaman
        $totalPages = ceil($jumlahAyat / $perPage);

        // Hitung batas awal dan akhir untuk setiap halaman
        $startAyat = ($page - 1) * $perPage + 1;
        $endAyat = min($startAyat + $perPage - 1, $jumlahAyat);

        // Fetch data ayat sesuai range halaman
        $url = "https://api.myquran.com/v2/quran/ayat/$surat/$startAyat-$endAyat";
        $response = $client->request('GET', $url);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);

        // Ubah data menjadi Collection
        $ayatList = collect($data['status'] ? $data['data'] : []);

        // Buat Paginator
        $paginator = new LengthAwarePaginator(
            $ayatList, // Data ayat
            $jumlahAyat, // Total jumlah ayat dalam surat
            $perPage, // Ayat per halaman
            $page, // Halaman saat ini
            ['path' => url()->current()] // Pastikan path pagination menggunakan query string
        );

        return view('quran.surat', [
            'ayatList' => $paginator, // Kirim paginator ke Blade
            'surat' => $surat,
            'jumlahAyat' => $jumlahAyat,
            'totalPages' => $totalPages, // Kirim jumlah halaman ke view
        ]);
    }
}
