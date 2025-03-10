<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ayat Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Daftar Ayat Surat</h1>

    @if ($ayatList->isNotEmpty())
        @foreach ($ayatList as $ayat)
            <div>
                <p class="text-end px-5"> {{ $ayat['arab'] }}</p>
                <p class="text-end px-5"> {{ $ayat['latin'] }}</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
