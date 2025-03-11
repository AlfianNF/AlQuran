<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ayat Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .text-end {
            font-size: 1.8rem;
            line-height: 2.5;
            color: #333;
            font-weight: bold;
        }
        .text-end.latin {
            font-size: 1rem;
            font-weight: normal;
            color: #555;
            line-height: 1.8;
        }
        .text-start {
            font-size: 1rem;
            line-height: 1.6;
        }
        .text-start strong {
            color: #007bff;
        }
        audio {
            width: 100%;
            margin-bottom: 20px;
        }
        hr {
            border: 1px solid #e0e0e0;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-link {
            border-radius: 5px;
            margin: 0 5px;
        }
        .pagination .active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Daftar Ayat Surat</h1>

        @if ($ayatList->isNotEmpty())
            @foreach ($ayatList as $ayat)
                <div>
                    <p class="text-end px-5"> {{ $ayat['arab'] }}</p>
                    <p class="text-end latin px-5"> {{ $ayat['latin'] }}</p>
                    <p class="text-start px-5"><strong>{{ $ayat['ayah'] }}.</strong> {{ $ayat['text'] }}</p>
                    <audio controls class="text-start px-5">
                        <source src="{{ $ayat['audio'] }}" type="audio/mpeg">
                        Browser Anda tidak mendukung elemen audio.
                    </audio>
                </div>
                <hr>
            @endforeach

            <div>
                {{ $ayatList->links() }}
            </div>
        @else
            <p>Tidak ada ayat yang ditemukan.</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>