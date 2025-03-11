<!DOCTYPE html>
<html>
<head>
    <title>Daftar Doa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Daftar Doa</h1>
        <ul class="list-unstyled">
            @foreach ($paginator as $index => $doa)
                <li class="text-decoration-none">
                    <h4 class="text-start px-5">{{ $startIteration + $index }}. {{ $doa['judul'] }}</h4>
                    <h4 class="text-end px-5">{{ $doa['arab'] }}</h4>
                    <p class="text-start px-5"><strong>Artinya: </strong>{{ $doa['indo'] }}</p>
                    <p class="text-start px-5"><strong>Sumber: </strong>{{ $doa['source'] }}</p>
                </li>
            @endforeach
        </ul>
        <div>
            {{ $paginator->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>