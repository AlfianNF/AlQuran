<!DOCTYPE html>
<html>
<head>
    <title>Semua hadist - {{ $perawiTerpilih['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center pt-3">Semua hadist Imam {{ $perawiTerpilih['name'] }}</h1>
        <ul class="list-unstyled">
            @foreach ($paginator as $hadis)
                <li class="text-decoration-none">
                    <p><strong>Hadis Nomor {{ $hadis['number'] }}</strong></p>
                    <h4 class="text-end px-5">{{ $hadis['arab'] }}</h4>
                    <p class="text-start px-5">{{ $hadis['id'] }}</p>
                </li>
            @endforeach
        </ul>
        {{ $paginator->links() }}
        <br>
        <button class="btn btn-primary text-center my-5 ">
            <a href="{{ route('hadist.index') }}" class="text-decoration-none text-white">Kembali ke Daftar Perawi</a>
        </button>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>

</body>
</html>