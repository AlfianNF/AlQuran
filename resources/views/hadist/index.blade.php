<!DOCTYPE html>
<html>
<head>
    <title>Daftar Perawi Hadis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center pt-3">Daftar Perawi Hadis</h1>
        <ul class="list-unstyled">
            @foreach ($perawis as $perawi)
                <li>
                    <a href="{{ route('hadist.show', ['slug' => $perawi['slug']]) }}" class=" text-black">
                        {{ $loop->iteration }}. Imam {{ $perawi['name'] }} ({{ $perawi['total'] }} hadis)
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>