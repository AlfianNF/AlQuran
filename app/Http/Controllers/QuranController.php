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

        $page = max(1, (int) $request->query('page', 1)); 
        $perPage = 30; 

        $totalPages = ceil($jumlahAyat / $perPage);

        $startAyat = ($page - 1) * $perPage + 1;
        $endAyat = min($startAyat + $perPage - 1, $jumlahAyat);

        $url = "https://api.myquran.com/v2/quran/ayat/$surat/$startAyat-$endAyat";
        $response = $client->request('GET', $url);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);

        $ayatList = collect($data['status'] ? $data['data'] : []);
        $paginator = new LengthAwarePaginator(
            $ayatList, 
            $jumlahAyat,
            $perPage, 
            $page,
            ['path' => url()->current()] 
        );

        return view('quran.surat', [
            'ayatList' => $paginator, 
            'surat' => $surat,
            'jumlahAyat' => $jumlahAyat,
            'totalPages' => $totalPages, 
        ]);
    }
}
