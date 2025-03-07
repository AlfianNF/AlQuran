<!DOCTYPE html>
<html>
<head>
    <title>Daftar Surah</title>
</head>
<body>
    <h1>Daftar Surah</h1>

    @if (isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif

    <ul>
        @foreach ($surahList as $surah)
            <li>
                <a href="{{ route('surat.show', ['surat' => $surah->number, 'jumlahAyat' => $surah->number_of_verses]) }}">
                    <strong>{{ $surah->name_id }}</strong> ({{ $surah->name_en }}) -
                    Surat: {{ $surah->number }}, Ayat: {{ $surah->number_of_verses }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>