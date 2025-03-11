<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HadistController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->get('https://api.myquran.com/v2/hadits/perawi/');
        $perawis = json_decode($response->getBody(), true)['data'];

        return view('hadist.index', compact('perawis'));
    }

    public function show(Request $request, $slug)
    {
        $client = new Client();

        $responsePerawi = $client->get('https://api.myquran.com/v2/hadits/perawi/');
        $perawis = json_decode($responsePerawi->getBody(), true)['data'];
        $perawiTerpilih = collect($perawis)->firstWhere('slug', $slug);

        if (!$perawiTerpilih) {
            abort(404, 'Perawi tidak ditemukan.');
        }

        $totalHadis = $perawiTerpilih['total'];

        $page = max(1, (int) $request->query('page', 1));
        $perPage = 20;

        $totalPages = ceil($totalHadis / $perPage);

        $startHadis = ($page - 1) * $perPage + 1;
        $endHadis = min($startHadis + $perPage - 1, $totalHadis);

        $hadisList = [];
        for ($nomor = $startHadis; $nomor <= $endHadis; $nomor++) {
            $responseHadis = $client->get("https://api.myquran.com/v2/hadits/{$slug}/{$nomor}");
            $hadis = json_decode($responseHadis->getBody(), true)['data'];
            if ($hadis) {
                $hadisList[] = $hadis;
            }
        }

        $hadisCollection = collect($hadisList);

        $paginator = new LengthAwarePaginator(
            $hadisCollection,
            $totalHadis,
            $perPage,
            $page,
            ['path' => url()->current()]
        );

        return view('hadist.show', [
            'paginator' => $paginator,
            'perawiTerpilih' => $perawiTerpilih,
            'totalPages' => $totalPages,
            'totalHadis' => $totalHadis,
        ]);
    }
}
