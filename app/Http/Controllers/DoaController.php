<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DoaController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $totalDoa = 108; // Total ID doa

        $page = max(1, (int) $request->query('page', 1));
        $perPage = 20;

        $totalPages = ceil($totalDoa / $perPage);

        $startId = ($page - 1) * $perPage + 1;
        $endId = min($startId + $perPage - 1, $totalDoa);

        $doaList = [];
        for ($id = $startId; $id <= $endId; $id++) {
            try {
                $responseDoa = $client->get("https://api.myquran.com/v2/doa/{$id}");
                $doa = json_decode($responseDoa->getBody(), true)['data'];
                if ($doa) {
                    $doaList[] = $doa;
                }
            } catch (\Exception $e) {
                // Tangani error jika API tidak merespons atau ID tidak ditemukan
                \Log::error("Error fetching doa with ID {$id}: " . $e->getMessage());
            }
        }

        $doaCollection = collect($doaList);

        $paginator = new LengthAwarePaginator(
            $doaCollection,
            $totalDoa,
            $perPage,
            $page,
            ['path' => url()->current()]
        );

        $startIteration = ($page - 1) * $perPage + 1;

        return view('doa.index', [
            'paginator' => $paginator,
            'totalPages' => $totalPages,
            'startIteration' => $startIteration,
        ]);
    }

    public function lokasi(Request $request)
    {
        $search = $request->input('search');

        $client = new Client();

        try {
            $response = $client->get('https://api.myquran.com/v2/sholat/kota/semua');

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true)['data'];
                $collection = collect($data);

                if ($search) {
                    $filteredData = $collection->filter(function ($item) use ($search) {
                        return stripos($item['lokasi'], $search) !== false;
                    });

                    return response()->json(['data' => $filteredData->values()]);
                }

                return response()->json(['data' => $data]);
            } else {
                return response()->json(['error' => 'Gagal mengambil data dari API', 'status' => $response->getStatusCode()], $response->getStatusCode());
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json(['error' => 'Gagal mengambil data dari API: ' . $e->getMessage()], 500);
        }
    }
}