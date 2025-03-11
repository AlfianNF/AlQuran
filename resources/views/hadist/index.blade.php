<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Perawi Hadis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-weight: bold;
            color: #0d6efd;
        }
        .btn-perawi {
            display: block;
            width: 90%;
            margin: 10px 0;
            padding: 15px;
            font-size: 1.2rem;
            text-align: center;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn-perawi:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Perawi Hadis</h1>
        @foreach ($perawis as $perawi)
        <center>
            <a href="{{ route('hadist.show', ['slug' => $perawi['slug']]) }}" class="btn-perawi">
                Imam {{ $perawi['name'] }} ({{ $perawi['total'] }} hadis)
            </a>
        </center>
            
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
