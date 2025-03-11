<!DOCTYPE html>
<html>
<head>
    <title>Daftar Surah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Daftar Surah</h1>

        @if (isset($error))
            <p class="text-danger">{{ $error }}</p>
        @endif

        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Nomor Surah</th>
                    <th>Nama Surah (Indonesia)</th>
                    <th>Nama Surah (Inggris)</th>
                    <th>Jumlah Ayat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surahList as $surah)
                    <tr>
                        <td>{{ $surah->number }}</td>
                        <td>{{ $surah->name_id }}</td>
                        <td>{{ $surah->name_en }}</td>
                        <td>{{ $surah->number_of_verses }}</td>
                        <td>
                            <a href="{{ route('surat.show', ['surat' => $surah->number, 'jumlahAyat' => $surah->number_of_verses]) }}" class="btn btn-primary btn-sm">Lihat Ayat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>